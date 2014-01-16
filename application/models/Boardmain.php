<?php
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
class Boardmain extends \Phalcon\Mvc\Model
{
	public $id;
	public $subject;
	public $contents;
	public $red_date;
	public $RS;
	/**
	 * table 매핑 
	 * @return string
	 */
 	public function getSource()
    {
        return 'board_main';
    }

    /*
     * 게시글 목록 가져오기 
     */
	public static function getList(){ 
	    $sql = "SELECT * FROM board_main order by id desc";
	    // Base model
	    $boardmain = new Boardmain();
	    // Execute the query
	    return new Resultset(null, $boardmain, $boardmain->getReadConnection()->query($sql));
	}
	
	/*
	 * 게시글 등록
	*/
	public static function write($param){
		$sql = "INSERT INTO board_main (
				subject,
				contents,
				red_date
				)VALUES(
				?,
				?,
				?
				);
				";
		// Base model
		$boardmain = new Boardmain();
		// Execute the query
		
		return $boardmain->getReadConnection()->execute($sql,$param);
	}

	/*
	 * 게시글 수정 
	*/
	public static function modify($param){
		$sql = "UPDATE board_main SET
					subject  = ?,
					contents = ?,
					red_date = ?
				WHERE id = ?
				";
		// Base model
		$boardmain = new Boardmain();
		// Execute the query
		return $boardmain->getReadConnection()->execute($sql,$param);
	}
	
	
	/*
	 * 게시글 단일 가져오기 
	*/
	public static function read($condition = '',$param=null){
		$sql = "SELECT * FROM board_main ";
		if($condition!=''){
			$sql .= " WHERE $condition";
		}
		// Base model
		$boardmain = new Boardmain();
		// Execute the query
		return new Resultset(null, $boardmain, $boardmain->getReadConnection()->query($sql,$param));
	}

	/*
	 * 게시글 삭제 
	*/
	public static function article_delete($condition,$param){
		$sql = "DELETE FROM board_main ";
		if($condition!=''){
			$sql .= " WHERE $condition";
		}
		// Base model
		$boardmain = new Boardmain();
		// Execute the query
		return $boardmain->getReadConnection()->execute($sql,$param);
	}
		
	
}