<?php
class Database
{
	public function __construct()
	{
		try
		{
			$conn = new PDO('mysql:host=' . _DB_HOST__ . ';dbname=' . _DB_TBL__, _DB_USER__, _DB_PASS__);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->db = $conn;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage()); 
		}
	}


	public function tbSelect($table, $conditions = array())
	{
		$sql  = 'SELECT ';
		$sql .= array_key_exists('select', $conditions) ? $conditions['select'] : '*';
		$sql .= ' FROM ' . $table;
		
		if (array_key_exists('where', $conditions))
		{
			$sql .= ' WHERE ';
			
			$i = 0;
			foreach ($conditions['where'] as $key => $value)
			{
				$pre  = ($i > 0) ? ' AND ' : '';
				$sql .= $pre . $key . ' = \'' . $value . '\'';
				$i++;
			}
		}

		if (array_key_exists('order_by', $conditions))
		{
			$sql .= ' ORDER BY ' . $conditions['order_by'];
		}

		if (array_key_exists('start', $conditions) && array_key_exists('limit', $conditions))
		{
			$sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
		}
		else if ( ! array_key_exists('start', $conditions) && array_key_exists('limit', $conditions))
		{
			$sql .= ' LIMIT ' . $conditions['limit'];
		}

		$query = $this->db->prepare($sql);
		$query->execute();

		if (array_key_exists('return_type', $conditions) && $conditions['return_type'] != 'all')
		{
			switch ($conditions['return_type'])
			{
				case 'count': 
					$data = $query->rowCount();
					break;
				case 'single': 
					$data = $query->fetch(PDO::FETCH_ASSOC);
					break;
				default: 
					$data = '';
			}
		}
		else
		{
			if ($query->rowCount() > 0)
			{
				$data = $query->fetchAll();
			}
		}

		return ! empty($data) ? $data : false;
	}


	public function tbInsert($table, $data)
	{
		if ( ! empty($data) && is_array($data))
		{
			$columns = '';
			$values  = '';
			$i       = 0;
			
			// if ( ! array_key_exists('created', $data))
			// {
			// 	$data['created'] = date('Y-m-d H:i:s');
			// }

			// if ( ! array_key_exists('modified', $data))
			// {
			// 	$data['modified'] = date('Y-m-d H:i:s');
			// }

			$columnString = implode(',', array_keys($data));
			$valueString  = ':' . implode(',:', array_keys($data));
			
			$sql   = 'INSERT INTO ' . $table . ' (' . $columnString . ') VALUES (' . $valueString . ')';
			$query = $this->db->prepare($sql);
			
			foreach ($data as $key => $val)
			{
				$query->bindValue(':' . $key, $val);
			}

			$insert = $query->execute();
			return $insert ? $this->db->lastInsertId() : false;
		}
		else
		{
			return false;
		}
	}
	

	public function tbUpdate($table, $data, $conditions)
	{
		if ( ! empty($data) && is_array($data))
		{
			$colvalSet = '';
			$whereSql  = '';
			$i         = 0;
			
			// if ( ! array_key_exists('modified', $data))
			// {
			// 	$data['modified'] = date('Y-m-d H:i:s');
			// }

			foreach ($data as $key => $val)
			{
				$pre        = ($i > 0) ? ', ' : '';
				$colvalSet .= $pre . $key . '=\'' . $val . '\'';
				$i++;
			}

			if ( ! empty($conditions) && is_array($conditions))
			{
				$whereSql .= ' WHERE ';
				$i         = 0;

				foreach ($conditions as $key => $value)
				{
					$pre       = ($i > 0) ? ' AND ' : '';
					$whereSql .= $pre . $key . ' = \'' . $value . '\'';
					$i++;
				}
			}

			$sql    = 'UPDATE ' . $table . ' SET ' . $colvalSet . $whereSql;
			$query  = $this->db->prepare($sql);
			$update = $query->execute();
			return $update ? $query->rowCount() : false;
		}
		else
		{
			return false;
		}
	}
	

	public function tbDelete($table, $conditions)
	{
		$whereSql = '';
		
		if ( ! empty($conditions) && is_array($conditions))
		{
			$whereSql .= ' WHERE ';
			$i         = 0;
			
			foreach ($conditions as $key => $value)
			{
				$pre       = ($i > 0) ? ' AND ' : '';
				$whereSql .= $pre . $key . ' = \'' . $value . '\'';
				$i++;
			}
		}
		
		$sql    = 'DELETE FROM ' . $table . $whereSql;
		$delete = $this->db->exec($sql);
		return $delete ? $delete : false;
	}
}
