<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;
use application\models\Main;

class MainController extends Controller {

	public function indexAction() {
		$pagination = new Pagination($this->route, $this->model->postsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->postsList($this->route),
		];
		$this->view->render('Главная страница', $vars);
	}

	public function aboutAction() {
		$this->view->render('Обо мне');
	}

	public function contactAction() {
		if (!empty($_POST)) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->contactAdd($_POST);
			$this->view->message('success', 'Сообщение отправлено Администратору');
		}
		$this->view->render('Контакты');
	}

	public function postAction() {
		$adminModel = new Admin;
		$mainModel = new Main;
		
		if (!$adminModel->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $adminModel->postData($this->route['id'])[0],
			'list' => $mainModel->CommentList($this->route['id']),
		];
		
		$this->view->render('Пост', $vars);
	}

	public function commentaddAction() {
		if (!empty($_POST)) {
				if (!$this->model->commentValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->commentAdd($_POST);
			$this->view->message('success', 'Комментарий опубликован');
		}
		$vars = [
			'data' => $adminModel->postData($this->route['id'])[0],
		];
		$this->view->render('Пост', $vars);
	}


}