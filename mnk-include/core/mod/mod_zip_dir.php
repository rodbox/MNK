<?php 

class zip_dir
{
  /**
   * Add files and sub-directories in a folder to zip file.
   * @param string $folder
   * @param ZipArchive $zipFile
   * @param int $exclusiveLength Number of text to be exclusived from the file path.
   */
  private  function folderToZip($folder, &$zipFile, $exclusiveLength,$filter) {

    if(!in_array($folder, $filter)){



      $handle = opendir($folder);
      while ($f = readdir($handle)) {
        if ($f != '.' && $f != '..') {
          $filePath = "$folder/$f";
  
          // Remove prefix from file path before add to zip.
          $localPath = substr($filePath, $exclusiveLength);
  
          if (is_file($filePath)) {
            $zipFile->addFile($filePath, $localPath);
          } elseif (is_dir($filePath)) {
            // Add sub-directory.
            $zipFile->addEmptyDir($localPath);
            self::folderToZip($filePath, $zipFile, $exclusiveLength,$filter);
          }
        }
      }
      closedir($handle);
    }
  }

  /**
   * Zip a folder (include itself).
   * Usage:
   *   HZip::zip_dir('/path/to/sourceDir', '/path/to/out.zip');
   *
   * @param string $sourcePath Path of directory to be zip.
   * @param string $outZipPath Path of output zip file.
   */
  public  function zip_dir($sourcePath, $outZipPath,$filter) {
    $pathInfo     = pathInfo($sourcePath);
    $parentPath   = $pathInfo['dirname'];
    $dirName    = $pathInfo['basename'];

    $z = new ZipArchive();
    $z->open($outZipPath, ZIPARCHIVE::CREATE);
    $z->addEmptyDir($dirName);
    self::folderToZip($sourcePath, $z, strlen("$parentPath/"),$filter);
    $z->close();
    
    if(file_exists($outZipPath))
      msg::success("ZIP_dir ".basename($sourcePath)." -> <strong>Ok</strong>");
    else
      msg::error("Un problème est survenue lors de la sauvegarde");
  }
}


 ?>