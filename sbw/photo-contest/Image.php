<?php

/**
 * Description of Image
 *
 * @category
 * @package
 * @version $Id$
 */

class Image
{
    /**
     * @var string Image location
     */
    protected $_image;

    protected $_imageResource;

    protected $_width;

    protected $_height;

    protected $_imageType = 'jpeg';

    protected $_imageCompression = 60;

    protected $_resizeRatio = 0;

    /**
     * Constructor
     * 
     * @param string $image Image location
     * @return Image
     */
    public function __construct( $image )
    {
        $this->_image = $image;

        if( !file_exists( $image ) ) {
            throw new Exception( 'File does not exist' );
        }

        $this->_imageResource = new Imagick( $image );
        $geometry = $this->_imageResource->getImageGeometry();

        $this->_width = $geometry['width'];
        $this->_height = $geometry['height'];
        
        return $this;
    }
    
    /**
     * Crop image
     * 
     * @param int $width
     * @param int $height
     * @param int $top
     * @param int $left
     * @return Image
     */
    public function crop( $width, $height, $top, $left )
    {
        // check variables
        $width = ( $width > $this->_width ) ? $this->_width : $width;
        $height = ( $height > $this->_height ) ? $this->_height : $height;

        $top = ( ( $top + $height ) > $this->_height ) ? 0 : $top;
        $left = ( ( $left + $width ) > $this->_width ) ? 0 : $left;
        
        $this->_imageResource->cropImage( $width, $height, $left, $top );
        return $this;
    }

    /**
     * Resize image
     *
     * @param int $width
     * @param int $height
     * @param boolean $constrain Constrain image or not
     * @return Image
     */
    public function resize( $width, $height, $constrain=false )
    {
        if( !$constrain ) {
            $geometry = $this->_imageResource->getImageGeometry();

            if( $width - $this->_width > $height - $this->_height ) {
                $this->_resizeRatio = $height / $this->_height;
                $width = 0;
            } else {
                $this->_resizeRatio = $width / $this->_width;
                $height = 0;
            }
        }
        $this->_imageResource->resizeImage( $width, $height, Imagick::FILTER_LANCZOS, 1 );
        return $this;
    }

    /**
     * Set the image type and compression value
     *
     * @param string $type
     * @param int $compression
     * @return Image
     */
    public function setImageType( $type, $compression=60 )
    {
        $this->_imageType = $type;
        $this->_imageCompression = $compression;
        return $this;
    }

    /**
     * Write image to file or return as string
     *
     * @param string $location Location to write file or null to return string
     * @return string|boolean Returns string of image or boolean true
     */
    public function write( $location=null )
    {
        if( $this->_imageType == 'jpeg' ) {
            $this->_imageResource->setCompression(Imagick::COMPRESSION_JPEG);
            $this->_imageResource->setCompressionQuality($this->_imageCompression);
            $this->_imageResource->setImageFormat('jpeg');
        } else {
            $this->_imageResource->setImageFormat($this->_imageType);
        }

        if( is_null( $location ) ) {
            // return image
            $im = $this->_imageResource->getImageBlob();
            $this->_imageResource->clear();
            $this->_imageResource->destroy();
            return $im;
        } else {
            // write to file
            $this->_imageResource->writeImage( $location );
            $this->_imageResource->clear();
            $this->_imageResource->destroy();
            return true;
        }
    }

    /**
     *
     * @param string $directory Location to write temp file
     * @return string Randomized filename
     */
    public function writeTmpFile( $directory )
    {
        $directory = rtrim( $directory, '/' );
        $filename = self::genRandomString() . '.' . $this->_imageType;
        $this->write( $directory . '/' . $filename );
        return $filename;
    }

    /**
     * Returns the resize ratio
     * 
     * @return float Resize ratio
     */
    public function getResizeRatio()
    {
        return round( $this->_resizeRatio, 3 );
    }

    /**
     * Generate random string
     * 
     * @param int $length
     * @return string
     */
    public static function genRandomString( $length=15 ) {
        $random= "";

        $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char_list .= "abcdefghijklmnopqrstuvwxyz";
        $char_list .= "1234567890";
        // Add the special characters to $char_list if needed
        for($i = 0; $i < $length; $i++) {
            $random .= substr($char_list,(rand()%(strlen($char_list))), 1);
        }
        return $random;
    }
}