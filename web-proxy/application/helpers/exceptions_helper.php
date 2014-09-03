<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MSISDN Handling Exceptions - thrown by various models and controllers
 */

/**
 * Class UnknownException
 */
class UnknownException extends Exception
{

}



/**
 * Class DisabledMSISDNException
 */
class NoHomeRouteSpecified extends Exception
{

}

/**
 * Class InvalidAuthCredentials
 */
class InvalidAuthException extends Exception
{

}

/**
 * Class DisabledMSISDNException
 */
class MissingParamsException extends Exception
{

}

/**
 * Class NotImplementedException
 */
class NotImplementedException extends Exception
{

}

/**
 * Class NoSMSRateFound
 */
class NoSMSRateFound extends Exception
{

}

/**
 * Class BalanceTooLow
 */
class BalanceTooLow extends Exception
{

}

/**
 * Class BillingFailed
 */
class BillingFailed extends Exception
{

}

/**
 * Class DlrFailed
 */
class DlrFailed extends Exception
{

}

/**
 * Class DlrFailed
 */

class TopUpFailedException extends Exception
{

}

/**
 * Class DlrFailed
 */
class SearchException extends Exception
{

}

/**
 * Class DlrFailed
 */
class InvalidEmailFormatException extends Exception
{

}

/**
 * Class ChangingRateCardException
 */
class  ChangingRateCardException extends Exception
{

}


/**
 * Class ChangingRateCardException
 */
class UnauthorizedUserActionExeption extends Exception
{


}


/**
 * Class WrongEmailFormatException
 */
class WrongEmailFormatException extends Exception
{


}
/**
 * Class WrongEmailFormatException
 */
class WrongPhoneFormatException extends Exception
{


}


/**
 * Class ExistingAccountException
 */
class ExistingAccountException extends Exception
{


}

/**
 * Class ExistingLoginException
 */
class ExistingLoginException extends Exception
{


}
/**
 * Class MySQLException
 */
class  MySQLException extends Exception
{

}
/**
 * Class MissingAccountsException
 */
class  MissingAccountsException extends Exception
{

}
/**
 * Class ArrayNoneNumericException
 */
class  ArrayNoneNumericException extends Exception
{

}
/**
 * Class FloorLocationException
 */
class FloorLocationException extends Exception
{

}
/**
 * Class NoLocationPerAccountException
 */
class NoLocationPerAccountException extends Exception
{

}
/**
 * Class NumericValueException
 */
class NumericValueException extends Exception
{

}


/**
 * Class OffsetMissingException
 */
class OffsetMissingException extends Exception
{

}

/**
 * Class DatesException
 */
class DatesException extends Exception
{

}
/**
 * Class GraylogMessageNullValue
 */
class GraylogMessageNullValue extends Exception
{

}
/**
 * Class GraylogHandlerNullValue
 */
class GraylogHandlerNullValue extends Exception
{

}
/**
 * Class LineNumberNullValue
 */
class LineNumberNullValue extends Exception
{


}
/**
 * Class ShortMessageNullValue
 */
class ShortMessageNullValue extends Exception
{

}

/**
 * Class FileNullValue
 */
class FileNullValue extends Exception
{

}
/**
 * Class TimeVaryingException
 */
class TimeVaryingException extends Exception
{

}

/**
 * Class NoneArrayException
 */
class NoneArrayException extends Exception
{

}
/**
 * Class AsrZeroCallsException
 */
class AsrZeroCallsException extends Exception
{

}


/**
 * Class MySQLNoRowsException
 */
class MySQLNoRowsException extends Exception
{

}

/**
 * Class FunctionNotInFunctionVectorException
 */
class FunctionNotInFunctionVectorException extends Exception
{

}
/**
 * Class ParameterNotExistsException
 */
class ParameterNotExistsException extends Exception
{

}

/**
 * Class BeanstalkExceptions
 */
class BeanstalkExceptions extends Exception
{

}


/**
 * Class AlreadyExistsExceptions
 */
class AlreadyExistsExceptions extends Exception
{

}





?>