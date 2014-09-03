/**
 * Created by Leonid on 8/25/14.
 */


var  app       = angular.module('ariApp',[]);
var  assetsURI = 'Stanley/web-proxy/index.php/AsteriskDashboard/';


var postToARI = function($http,$scope,server,uri,postJSONObject,successCallBack,failedCallBack){

    $http.post("http://" + server + "/" + uri ,postJSONObject)
        .success(successCallBack)
        .error(failedCallBack);

};


var getFromARI = function($http,$scope,server,uri,successCallBack,failedCallBack){

    $http.get("http://" + server + "/" + uri ,{ withCredentials : true })
        .success(successCallBack)
        .error(failedCallBack);

};

app.controller('channelsCtrl', function($scope,$http){

    $scope.deleteChannel = function(channelID){
        var postObject = { channelID : channelID };

        postToARI($http,$scope,'localhost', assetsURI+ 'channel_delete', postObject,function(success){
            console.log(success);
        },function(failed){
            console.log(JSON.stringify(failed))

        });

    };
    $scope.retreiveChannels = function(){
        getFromARI($http,$scope,'localhost', assetsURI + 'channel_list',function(data){

            if(! data){ data = [];} //if returned false set as empty

            $scope.channels = data;

        },function(failed){
            console.log(JSON.stringify(failed))
        });
    };


    setInterval(function(){ //set an interval
        $scope.retreiveChannels();
    },1000);
});


app.controller('endPointsCtrl',function($scope,$http){

    $scope.fetchEndPoints = function(){

        getFromARI($http,$scope,'localhost',assetsURI + 'endpoints',function(data){

            if(! data){ data = []; }

            $scope.endPoints = data;

        },function(failed){
            console.log(JSON.stringify(failed))
        });


    };

    setInterval(function(){ //set an interval
        $scope.fetchEndPoints();
    },1000);



});


