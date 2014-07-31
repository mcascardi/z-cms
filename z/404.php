<?php
return new Z(
	     $html, array('lang' => 'en-US'),
	     new Z($head, new Z($title, '404 Error')),
	     new Z($body,
		   new Z($h1, array('class' => 'title'), 'OH NO!!'), 
		   new Z($h4, "Now hang on a minute there cowboy, ",
			 "where do you think you're going?")
		   )
	     );
