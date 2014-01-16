<?php

class BoardController extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		Phalcon\Tag::setTitle('board');
	}

	public function indexAction()
	{
		/**
		 * 첫 board controller 진입시 list 페이지 호출 
		 * 현재 redirect 처리
		 * 차후 url 변경 없이 listAction 과 동일한 동작을할수 있도록 변경 필요 
		 * 2014-01-16
		 **/
		$this->response->redirect('board/list');
		
	}
	/**
	 * 게시판 목록 화면 
	 */
	public function listAction()
	{
		/**TODO
		 * model 명에 _가 포함되어있을경우 처리가 되지 않는다.
		 * model 함수 getSource 에서 매칭 테이블명을 재정의 해주어야 한다.
		 * 쿼리 구문에서 FROM 다음에 오는 부분은 자동으로 모델명으로 인식을 한다.
		 * 차후 join 관련하여 모델 제작하는 방법 연구 필요 
		 **/
		//Executing a simple query

		//컨트롤러에서 쿼리를 날리는 방식 
		//$list_obj = $this->modelsManager->executeQuery("SELECT * FROM boardmain order by boardmain.id desc");

		//모델단에서 쿼리를 날리는 방식 
		$list_obj = Boardmain::getList();

	 	//$this->view->setVar('list',$list_obj);
		
		/**
		 * 쿼리 실행 결과를 가져올때 쓸대 없는(??) 실제 데이터 보다 많은 데이터 (팔콘 기본 설정 데이터) 를 같이 가져오기 때문에 재 정의 해주는 작업 실행 
		 */
		
	 	$i = count($list_obj); //넘버링을 위한 변수 
		$r_list_obj = array(); //실제 view 파일에 값을 셋팅 하기 위한 
	 	foreach($list_obj as $article){
	 		$article->no = $i;
			$r_article = new stdClass();
	 	 	$r_article->no = $i;
	 		$r_article->id = $article->id;
	 		$r_article->subject = $article->subject;
	 		$r_article->contents = $article->contents;
	 		$r_article->red_date = substr($article->red_date,0,10);
	 		$i--;
			$r_list_obj[] = $r_article;
			
		}
		
		$this->view->setVar('list',$r_list_obj);
	}
	/**
	 * 게시판 글보기 화면  
	 * @param unknown $id
	 */
	public function viewAction($id)
	{
		//컨트롤러에서 쿼리 날리는 방식
		//$v_obj = $this->modelsManager->executeQuery("SELECT * FROM boardmain WHERE boardmain.id = :id:",array('id'=>$id));
		$v_obj = Boardmain::read('id = ?',array($id));
		
		/**
			결과값을 무조건 배열로 가져오기 때문에 view 파일에 배열형식으로 사용하지 않기 위하여 가공처리 
		 */
		$r_view = new stdClass();
		$r_view->id = $id;
		foreach($v_obj as $obj){
			$r_view->subject = $obj->subject;
			$r_view->contents = nl2br($obj->contents);
			$r_view->red_date = $obj->red_date;
		}
		
		$this->view->setVar('article',$r_view);
	}
	
	/**
	 * 글쓰기 화면
	 */
	public function writeAction(){

	}

	/**
	 * 글수정 화면
	 * @param number $id
	 */
	public function modifyAction($id){
		//컨트롤러에서 직접 쿼리를 날리는 방식 
		//$v_obj = $this->modelsManager->executeQuery("SELECT * FROM boardmain WHERE boardmain.id = :id:",array('id'=>$id));
		//모델에서 쿼리를 실행 하는 방식 
		$v_obj = Boardmain::read('id = ?',array($id));
		$r_view = new stdClass();
		$r_view->id = $id;
		foreach($v_obj as $obj){
		$r_view->subject = $obj->subject;
		$r_view->contents = $obj->contents;
		$r_view->red_date = $obj->red_date;
		}

		$this->view->setVar('article',$r_view);
		
		$this->view->pick('board/write');
	}
	
	
	/**
	 * 글 등록 분기 처리  
	 */
	public function saveAction(){
		$post = $this->request->getPost();
		$id = $post['id'];
		$param = array(
				$post['subject'],
				$post['contents'],
				date('Y-m-d h:i:s')
		);
		if($id!=''){
			array_push($param, $id);
			Boardmain::modify($param);
			$this->response->redirect('board/view/'.$id);
		}else{
			Boardmain::write($param);
			$this->response->redirect('board/list');
		}
	}
	
	/**
	 * 글 삭제 (delete);
	 */
	public function deleteAction($id){
		Boardmain::article_delete(' id =? ', array($id));
		$this->response->redirect('board/list');
	}
}

