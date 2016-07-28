<?php

class RecuperarController extends \HXPHP\System\Controller
{
	public function __construct($configs)
	{
		parent::__construct($configs);

		$this->load(
			'Services\Auth',
			$configs->auth->after_login,
			$configs->auth->after_logout,
			true
		);

		$this->auth->redirectCheck(true);
		
	}

	public function indexAction()
	{
		$this->load('Helpers\Alert',array(
					'warning',
					'Recupere sua senha.',
					'Um link de redefinição será enviado para o seu e-mail. Por favor, verifique a caixa de SPAM'
				));
	}

	public function solicitarAction()
	{	
		$this->view->setFile('index');

		$this->load('Modules\Messages','password-recovery');
		$this->messages->setBlock('alerts');

		$this->request->setCustomFilters(array(
			'email' => FILTER_VALIDATE_EMAIL
		));

		$email = $this->request->post('email');

		$error = null;

		if(!is_null($email) && $email !== false){
			$validar = Recovery::validar($email);

			if($validar->status === false){
				$error = $this->messages->getByCode($validar->code);
			}
		}
		else{
			$error = $this->messages->getByCode('nenhum-usuario-encontrado');
		}

		if(!is_null($error)){
			$this->load('Helpers\Alert',$error);
		}
		else{
			$success = $this->messages->getByCode('link-enviado');

			$this->view->setFile('blank');

			$this->load('Helpers\Alert',$success);
		}
	}

	public function redefinirAction($token)
	{

	}

	public function alterarSenhaAction($token)
	{

	}
}
