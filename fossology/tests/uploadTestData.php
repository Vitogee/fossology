<?php
/***********************************************************
 Copyright (C) 2008 Hewlett-Packard Development Company, L.P.

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 version 2 as published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 ***********************************************************/

/**
 * Upload Test data to the repo
 *
 * Uses the simpletest framework, this way it doesn't matter where the
 * repo is, it will get uploaded, and this is another set of tests.
 *
 * @param URL obtained from the test enviroment globals
 *
 * @version "$Id: $"
 *
 * Created on Aug 15, 2008
 */

/* Upload the following files from the fosstester home directory:
 * - simpletest_1.0.1.tar.gz
 * - gplv2.1
 * - Affero-v1.0
 * - http://www.gnu.org/licenses/gpl-3.0.txt
 * - http://www.gnu.org/licenses/agpl-3.0.txt
 */

require_once ('fossologyWebTestCase.php');
require_once ('TestEnvironment.php');
require_once ('testClasses/upload.php');

global $URL;

class uploadTestDataTest extends fossologyWebTestCase
{
  public $mybrowser;

  function testuploadTestData()
  {
    global $URL;
    $rootFolder = 1;
    $uploadList = array('archives/simpletest_1.0.1.tar.gz',
                        'licenses/gplv2.1',
                        'licenses/Affero-v1.0');
    $urlList = array('http://www.gnu.org/licenses/gpl-3.0.txt',
                     'http://www.gnu.org/licenses/agpl-3.0.txt');

    print "starting testUploadTestData\n";
    $upFile = new uploadAFile();
    foreach($uploadList as $upload)
    {
      $upFile->uploadAFile($rootFolder, $upload, $description);
    }
  }
}
?>
