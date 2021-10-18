<?php
#
# A simple script to overwrite disk with a large file again and again until 
# memory runs out
#

//no limit on execution time
set_time_limit(0);

//Target drive that you want to overwrite
//Make sure its empty - manually delete all files
$targetDrive = "C:/";

//Very large file in target drive
$largeFileName = "movie.mp4";


$d = dir ($targetDrive);

while (false !== ($entry = $d->read())) {	
	if ($entry == $largeFileName) {
		//we do not want to delte the original file
		//we might run multiple passes
		continue;
	}
	
	//delete file
	unlink($targetDrive.$entry);
}
$d->close();
exit();

for ($i = 1; $i < 5000; $i++) {
	copy($targetDrive.$largeFileName, $targetDrive.'_'.$i.".dll");
	echo "Overwrite disk $i<br>";
	flush();
}

