<?php /* 33 Lines */

######################################################################################
# adilbo™ Software                                                                   #
#              _   _   _              ____        ___ _                              #
#    __ _  ___| |_| | | |___   ___™  / ___|  ___ / __| |_  _     _  __ _ _ __  ___   #
#   / _` |/ __  | | | |  __ \ / _ \  \___ \ / _ \| _|| __/| | _ | |/ _` | '__|/ __\  #
#  | (_| | (__| | | |_| |__) | (_) |  ___) | (_) | | | |_ | || || | (_| | |  |  _|   #
#   \__,_|\___,_|_|___|_,___/ \___/  |____/ \___/|_|  \__| \_____/ \__,_|_|   \___/  #
#                                                                                    #
# Copyright  ©  2015-2022 adilbo  -  http://www.adilbo.com/  -  All rights reserved! #
######################################################################################'
/*  VERSION 3  -  02.2022  */

//  SHOW "Reverse engineering prohibited" HINT
    $ADILBO_HINT = true; // true OR false (without "" or '')
    $ADILBO_HINT_TEXT = ''; // YOUR OWN HINT MESSAGE

//  RANDOM CRYPT FACTOR
    $ADILBO_RANDOM_CRYPT_FACTOR = 0; // NOTE: Value must be between 0 and 100000

//  AFTER HOW MANY DATA-CHUNKS A LINE-BREAK SHOULD BE MADE
    $ADILBO_CHUNKS_PER_LINE = 100; // NOTE: Value must be between 1 and 100
    
//  ADD FAKE DATA: HIGHER VALUE = SAFER, BUT LONGER DATA AND LONGER LOADING-TIME  
//  A greater $ADILBO_ADD_FAKE_DATA, need a smaller $ADILBO_CHUNKS_PER_LINE
    $ADILBO_ADD_FAKE_DATA = 0; // NOTE: Value must be between 0 and 10

//  USE THIS ONLY IN DEVELOPMENT MODE
    $ADILBO_DEBUG = false; // true OR false (without "" or '')

/* EOF - end of file */
