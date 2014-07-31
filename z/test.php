<?php
return new Z(
	   $body, 
	   new Z($h1, array('class' => 'title'), 'It Works'), 
	   new Z($h4, 'And its awesome','test', array('id' => 'subtext')),
	   array('id' => 'mine') 
	   );
