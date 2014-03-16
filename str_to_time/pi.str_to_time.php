<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Str To Time
*
* @package Str To Time
* @author  Ahmad Saad ALdeen
*/

$plugin_info = array(
	'pi_name'			=> 'Str To Time',
	'pi_version'		=> '1.0',
	'pi_author'			=> 'Ahmad Saad ALdeen',
	'pi_author_url'		=> '',
	'pi_description'	=> '',
	'pi_usage'			=> str_to_time::usage(),
);

class str_to_time
{
	public $return_data = "";
	
	function __construct()
	{
		// Get parameters data
		$this->EE =& get_instance();
		$data=($this->EE->TMPL->fetch_param('date'))? $this->EE->TMPL->fetch_param('date') : "" ;
		if ( ! is_numeric($data) && trim($data) && ! empty($data))
		{
			$data = $this->EE->localize->string_to_timestamp($data);
		}

		if ($data === FALSE)
		{
			$this->return_data = lang('invalid_date');
		}
		else
		{
			$this->return_data = $data;
		}
	}
	

// ----------------------------------------
//  Plugin Usage
// ----------------------------------------

// This function describes how the plugin is used.

function usage()
{
ob_start(); 
?>

Return Unix Timestamp from Str Date.

Param:

date: any valid date formt. (required)

{exp:str_to_time date="May 20th, 2007"}

<?php
$buffer = ob_get_contents();
	
ob_end_clean(); 

return $buffer;
}
/* END */

} 
// END Str To Time Class

/* End of file  pi.str_to_time.php */
/* Location: ./system/expressionengine/third_party/str_to_time/pi.str_to_time.php */