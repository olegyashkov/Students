<?php

/**
* 
*/
class Students implements StudentGroupInterface 
{


	private $name;
	private $handler;
	private $content =false;
	public $students=[];
	public $keys = [];
	public function __construct($name,$mode = 'a+')
	{
		$this->name =$name;
		$this->open($mode);
	}

	// public function __destruct()
	// {
	// 	$this->close();
	// }

	public function open($mode)
	{
		$this->handler=fopen($this->name, $mode);

		if($this->handler===FALSE)
		{
			throw new Exception('Unable to open file');
		}
	}

	public function close()
	{

		fclose($this->handler);
	}

	public function all($offset=0,$limit=0)
	{
		if(!empty($this->content))
		{
			return $this->content;
		}
		if(get_resource_type($this->handler)=='Unknown')
		{
			throw new Exception('call open method');
		}

		$this->content ='';
		// $length =100;
		$this->keys = ['id','fio','birthday','phone'];
		while (!feof($this->handler)) 
		{
			// $this->content .=$part;
			$students[] = explode(";", fgets($this->handler,1000));

			foreach ($students as $key =>$value) {
				$students[$key] = array_combine($this->keys, $students[$key]);
			}
			

		}

		  if($offset > 0)
		  {
		  	for($i = $offset; $i <= $limit; $i++)
		  	{
		  		echo '<pre>';
				var_dump($students[$i]);
				echo '</pre>';
		  	}
		  }


		return $students;
	}

	public function get($id)
	{
		$students =$this->all();
		if($id > 0 OR $id <= count($students))
		{
			var_dump($students[$id-1]);
		}
		else
		{
			throw new Exception('call open method');

		}

		
	}

	public function find($query)
	{

	}

	public function add($data)
	{

	}

	public function edit($id, $data)
	{

	}

	public function delete($id)
	{
		
	}
}


