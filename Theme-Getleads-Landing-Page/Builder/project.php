<?php
	if(isset($_POST['status']) && $_POST['status'] === "xsExpFile" && !empty($_POST['xsJSONFile'])) {
		header( 'Content-Description: File Transfer' );
		header( 'Content-Type: application/octet-stream' );
		header( 'Content-Disposition: attachment; filename=builder.xs' );
		header( 'Content-Transfer-Encoding: binary' );
		header( 'Connection: Keep-Alive' );
		header( 'Expires: 0' );
		header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
		header( 'Pragma: public' );

		echo $_POST['xsJSONFile'];

	} 
        if((isset($_FILES['xsImportDesign']))  && $_POST['status'] === "xsImpFile"){
            $ImpFile = file_get_contents($_FILES['xsImportDesign']['tmp_name']);
            
            exit(json_encode(array('data' => $ImpFile)));
        }