<?php
namespace CakeFile\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\Folder;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\Filesystem\File;

/**
 * Upload component
 */
class UploaderComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'data_dir' => USERS_DATA,
        'upload_domain' => 'users', //for example controller name
        'upload_dir' => 'images', // folder where uploaded files will be stored
        'max_file_size' => 300, //TODO implement function for max file size
        'allowed' => ['png', 'jpg', 'jpeg']
    ];

    /**
     * @param null $file
     * @return string
     */
    public function upload($file = null) {
        $config = $this->config();
        $uploadDir = $config['data_dir'] . $config['upload_domain'] . DS . $config['upload_dir'];
        $this->_folderExists($uploadDir);
        $fileExtension = substr(strchr($file['name'], '.'), 1);
        if (in_array($fileExtension, $config['allowed'])) {
            if (is_uploaded_file($file['tmp_name'])) {
                $newFilename = Text::uuid().'.'.$fileExtension;
                move_uploaded_file($file['tmp_name'], $uploadDir.DS.$newFilename);
            }
        } else {
            $newFilename = 'not allowed';
            throw new InternalErrorException('Not allowed type of file, allowed are '.Text::toList($config['allowed']), 1);
        }
        //returning full upload link....
        return $config['data_dir'] . DS . $config['upload_domain'].DS.$config['upload_dir'].DS.$newFilename;
    }

    /**
     * _folderExists method Check if exists folder for upload and if false create one.
     * @param null $folderPath
     */
    private function _folderExists($folderPath = null) {
        $folder = new Folder('/');
        if (!$folder->cd($folderPath)) {
            $folder->create($folderPath);
        }
    }
}
