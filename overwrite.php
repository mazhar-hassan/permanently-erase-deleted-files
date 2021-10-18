<?php
#
# A simple script to overwrite disk with a large file again and again until 
# memory runs out
#

//no limit on execution time
set_time_limit(0);

//Target drive that you want to overwrite
//Make sure its empty - manually delete all files
$targetDrive = "C:/some/";

//Very large file in target drive
$largeFileName = "movie.mp4";

for ($i = 1; $i < 3000; $i++) {
	copy($targetDrive.$largeFileName, $targetDrive.'_'.$i.".dll");
	echo "Overwrite disk $i<br>";
	flush();
}

