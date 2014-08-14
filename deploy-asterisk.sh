#!/bin/bash
#
#    ___                      __ _      _     _ _____	       _
#   / _ \_ __ ___  ___ _ __  / _(_) ___| | __| /__   \___  ___| |__
#  / /_\/ '__/ _ \/ _ \ '_ \| |_| |/ _ \ |/ _` | / /\/ _ \/ __| '_ \
# / /_\\| | |  __/  __/ | | |  _| |  __/ | (_| |/ / |  __/ (__| | | |
# \____/|_|  \___|\___|_| |_|_| |_|\___|_|\__,_|\/   \___|\___|_| |_|
#
# deploy-asterisk      Deploy the Asterisk source code, patch, compile and install
#
#  Created by:  Nir Simionovich <nirs@greenfieldtech.net>
#  Created on:  27/02/2014
#    Modified:  27/02/2014 <Nir Simionovich>
#   Copyright:  GPL v2
# Created for:  Greenfield Technologies Ltd

# My CentOS version
MY_CENTOS_VERSION=`cat  /etc/redhat-release | cut -d" " -f4 | cut -d"." -f1`

# What Asterisk source code tag are we working with
MY_GIT_REPO=/tmp

MY_EPEL=epel-release-$MY_CENTOS_VERSION-8.noarch.rpm
MY_EPEL_REPO=http://fedora.mirrors.romtelecom.ro/pub/epel/$MY_CENTOS_VERSION/x86_64

MY_ASTERISK_MAJOR=12
MY_ASTERISK_MINOR=4.0
MY_ASTERISK_VERSION=$MY_ASTERISK_MAJOR.$MY_ASTERISK_MINOR

MY_ASTERISK_USER=apache
MY_ASTERISK_GROUP=apache
MY_ASTERISK_DOWNLOAD_PATH=http://downloads.asterisk.org/pub/telephony/asterisk/old-releases

# Specific deployment switches, invoked post installation
MY_ASTERISK_MYSQL=0
MY_ASTERISK_MYSQL_CDR=0
MY_ASTERISK_MYSQL_REALTIME=0
MY_ASTERISK_MYSQL_REALTIME_IAX=0
MY_ASTERISK_MYSQL_REALTIME_SIP=0



# Check that GCC is here at all
if [ -f /usr/bin/gcc ]; then
	yum install -y gcc gcc-cpp gcc-c++ automake autoconf uuid libuuid libuuid-devel python-devel libevent-devel unbound-devel unbound-libs unbound-python
fi

MY_CODEC_COMPILER=-`gcc --version | grep gcc | cut -d" " -f1,3 | tr " " "\0" | cut -d"." -f1`

# Check GCC version
if [ $MY_CODEC_COMPILER != -gcc4 ]; then
    GCC_VER=`gcc --version | grep gcc`
    echo "Your GCC version is: $GCC_VER [$MY_CODEC_COMPILER]"
    echo "You need GCC Version 4 for this to compile and run correctly !"
    exit 99
fi

# Setup EPEL repository
if [ $MY_CENTOS_VERSION != 7 ]; then
	if [ -f /etc/yum.repos.d/epel.repo ]; then
	     echo "EPEL Repository installed - your'e 3l1t3 m4n!"
	     yum-config-manager --enable epel
	else
	echo "Installing EPEL Repository"
	rpm -Uhv $MY_EPEL_REPO/$MY_EPEL
	RPM_RESULT=$?
	if [ $RPM_RESULT != 0]; then
	  echo "Unable toe configure EPEL repository, bummer - bailing out"
	  exit 99
	fi
	yum-config-manager --enable epel
	fi
fi

# Check for previous Asterisk version - and get rid of it
if [ -d /etc/asterisk ]; then
	echo "Previous Asterisk version detected - getting rid of it"
	rm -rf /etc/asterisk
	rm -rf /var/lib/asterisk
	rm -rf /var/spool/asterisk
	rm -rf /usr/lib/asterisk
	rm -rf /usr/lib64/asterisk
	rm -f /usr/sbin/asterisk
	rm -f /etc/init.d/asterisk
fi

# Now, let's setup the various packages we need
yum update -y
yum install -y automake autoconf zlib zlib-devel openssl openssl-devel gcc gcc-c++ cpp ncurses ncurses-devel wget
yum install -y libuuid libuuid-devel gcc-c++ make gnutls-devel kernel-devel libxml2-devel
yum install -y subversion doxygen texinfo curl-devel net-snmp-devel neon-devel patch
yum install -y sqlite sqlite-devel libsrtp libsrtp-devel ngrep httpd opus opus-devel

if [ $MY_CENTOS_VERSION == 7 ]; then
	yum install -y mariadb mariadb-devel mariadb-libs mariadb-server perl-DBD-MySQL php-mysql fail2ban
else
	yum install -y mysql mysql-server mysql-devel mysql-libs perl-DBD-MySQL php-mysql fail2ban
fi

if [ $MY_ASTERISK_MAJOR == 12 ]; then
	yum install jansson-devel jansson
fi

# Download Asterisk
cd /usr/src
if [ -f /usr/src/asterisk-$MY_ASTERISK_VERSION.tar.gz ]; then
  rm -f /usr/src/asterisk-$MY_ASTERISK_VERSION.tar.gz
  rm -rf /usr/src/asterisk-$MY_ASTERISK_VERSION
fi
wget $MY_ASTERISK_DOWNLOAD_PATH/asterisk-$MY_ASTERISK_VERSION.tar.gz

# Untar and get ready to rock!
tar -zxvf asterisk-$MY_ASTERISK_VERSION.tar.gz
cd /usr/src/asterisk-$MY_ASTERISK_VERSION
./configure

ASTERISK_RESULT=$?
if [ $ASTERISK_RESULT != 0 ]; then
  echo "Asterisk build configuration failed, failing out - revert to manual compilation please"
  exit 99
fi

make all && make install && make samples

ASTERISK_RESULT=$?
if [ $ASTERISK_RESULT != 0 ]; then
  echo "Asterisk build failed, failing out - revert to manual compilation please"
  exit 99
fi

# Deploying init script
cp /usr/src/asterisk-$MY_ASTERISK_VERSION/contrib/init.d/rc.redhat.asterisk /$MY_GIT_REPO/asterisk.init.v1
sed 's/__ASTERISK_SBIN_DIR__/\/usr\/sbin/' /$MY_GIT_REPO/asterisk.init.v1 > /$MY_GIT_REPO/asterisk.init.v2
sed 's/#AST_CONFIG/AST_CONFIG/' /$MY_GIT_REPO/asterisk.init.v2 > /$MY_GIT_REPO/asterisk.init.v1
sed 's/__ASTERISK_ETC_DIR__/\/etc\/asterisk/' /$MY_GIT_REPO/asterisk.init.v1 > /$MY_GIT_REPO/asterisk.init.v2
cp /$MY_GIT_REPO/asterisk.init.v2 /etc/init.d/asterisk
chmod +x /etc/init.d/asterisk
chkconfig --add asterisk
chkconfig --level 35 asterisk on

# Fixing permissions
sed 's/;runuser = asterisk/runuser = $MY_ASTERISK_USER/' /etc/asterisk/asterisk.conf > /$MY_GIT_REPO/asterisk.conf.v1
sed 's/;rungroup = asterisk/;rungroup = $MY_ASTERISK_GROUP/' /$MY_GIT_REPO/asterisk.conf.v1 > /$MY_GIT_REPO/asterisk.conf.v2
cp /$MY_GIT_REPO/asterisk.conf.v2 /etc/asterisk
chown -R $MY_ASTERISK_USER.$MY_ASTERISK_GROUP /var/lib/asterisk /var/spool/asterisk /var/run/asterisk /var/log/asterisk /etc/asterisk

# cleanup
rm -f /$MY_GIT_REPO/asterisk.conf.v1
rm -f /$MY_GIT_REPO/asterisk.conf.v2
rm -f /$MY_GIT_REPO/asterisk.init.v1
rm -f /$MY_GIT_REPO/asterisk.init.v2
rm -rf /usr/src/asterisk-$MY_ASTERISK_VERSION
rm -f /usr/src/asterisk-$MY_ASTERISK_VERSION.tar.gz

if [ $MY_ASTERISK_MYSQL == 1 ]; then
    service mysqld start
    mysqladmin drop asterisk -f
    mysqladmin create asterisk

    # MYSQL_CDR
    if [ $MY_ASTERISK_MYSQL_CDR == 1 ]; then
	mysql asterisk < /$MY_GIT_REPO/usr/src/asterisk-addons/cdrs.sql
	mysql < /$MY_GIT_REPO/usr/src/asterisk-addons/asterisk-grant.sql
	cp -R /$MY_GIT_REPO/usr/src/asterisk-addons/cdr_mysql.conf /etc/asterisk/
    fi

    # REALTIME
    if [ $MY_ASTERISK_MYSQL_REALTIME == 1 ]; then
	cp -R /$MY_GIT_REPO/usr/src/asterisk-addons/res_config_mysql.conf /etc/asterisk/
	cp -R /$MY_GIT_REPO/usr/src/asterisk-addons/extconfig.conf /etc/asterisk/

	# REALTIME SIP
	if [ $MY_ASTERISK_MYSQL_REALTIME_SIP == 1 ]; then
	    mysql asterisk < /$MY_GIT_REPO/usr/src/asterisk-addons/sippeers.sql
	    echo "sippeers => mysql,general,sippeers" >> /etc/asterisk/extconfig.conf
	fi

	# REALTIME IAX
	if [ $MY_ASTERISK_MYSQL_REALTIME_IAX == 1 ]; then
	    mysql asterisk < /$MY_GIT_REPO/usr/src/asterisk-addons/iaxpeers.sql
	    echo "iaxpeers => mysql,general,iaxpeers" >> /etc/asterisk/extconfig.conf
	fi
    fi
fi

ldconfig

echo "Asterisk compilation complete - please reboot the server and return to the installation document to continue"