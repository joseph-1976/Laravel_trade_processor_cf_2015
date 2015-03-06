<?php

/**
 * The CF theme path Class.
 */
class ThemePath {

    /**
     * Function that gets the chosen theme path
     * @return string

     */
    public static function getPath($type)
    {
        switch($type) {
            case 'local':
                //local path
                return URL::to('/').'/app/themes/customGridGraph';
                break;
            case 'bucket':
                //if assets are externalized to a Bucket somewhere
                //eg absolute value for bucket
                return '//path.to.bucket/bucket_name';
                break;
            default:
                //return local path
                return app('path').'/themes/customGridGraph';
       }
        
    }
    
}
?>
