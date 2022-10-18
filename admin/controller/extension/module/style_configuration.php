<?php
class ControllerExtensionModuleStyleConfiguration extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/style_configuration');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_style_configuration', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/style_configuration', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/style_configuration', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_style_configuration_status'])) {
			$data['module_style_configuration_status'] = $this->request->post['module_style_configuration_status'];
		} else {
			$data['module_style_configuration_status'] = $this->config->get('module_style_configuration_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/style_configuration', $data));
	}

	public function colors(){
		$this->load->language('extension/module/style_configuration');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_color', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/style_configuration/colors', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_color'),
			'href' => $this->url->link('extension/module/style_configuration/colors', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/style_configuration/colors', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		$this->load->model('tool/image');

		if (isset($this->request->post['module_color_buttons_color'])) {
			$data['module_color_buttons_color'] = $this->request->post['module_color_buttons_color'];
		} else {
			$data['module_color_buttons_color'] = $this->config->get('module_color_buttons_color');
		}

		if (isset($this->request->post['module_color_buttons_text_color'])) {
			$data['module_color_buttons_text_color'] = $this->request->post['module_color_buttons_text_color'];
		} else {
			$data['module_color_buttons_text_color'] = $this->config->get('module_color_buttons_text_color');
		}

		if (isset($this->request->post['module_color_breadcrumb_text_color'])) {
			$data['module_color_breadcrumb_text_color'] = $this->request->post['module_color_breadcrumb_text_color'];
		} else {
			$data['module_color_breadcrumb_text_color'] = $this->config->get('module_color_breadcrumb_text_color');
		}

		if (isset($this->request->post['module_color_breadcrumb_background_color'])) {
			$data['module_color_breadcrumb_background_color'] = $this->request->post['module_color_breadcrumb_background_color'];
		} else {
			$data['module_color_breadcrumb_background_color'] = $this->config->get('module_color_breadcrumb_background_color');
		}

		if (isset($this->request->post['module_color_menu_text_color'])) {
			$data['module_color_menu_text_color'] = $this->request->post['module_color_menu_text_color'];
		} else {
			$data['module_color_menu_text_color'] = $this->config->get('module_color_menu_text_color');
		}

		if (isset($this->request->post['module_color_menu_color'])) {
			$data['module_color_menu_color'] = $this->request->post['module_color_menu_color'];
		} else {
			$data['module_color_menu_color'] = $this->config->get('module_color_menu_color');
		}

		if (isset($this->request->post['module_color_menu_hover_color'])) {
			$data['module_color_menu_hover_color'] = $this->request->post['module_color_menu_hover_color'];
		} else {
			$data['module_color_menu_hover_color'] = $this->config->get('module_color_menu_hover_color');
		}

		if (isset($this->request->post['module_color_h1'])) {
			$data['module_color_h1'] = $this->request->post['module_color_h1'];
		} else {
			$data['module_color_h1'] = $this->config->get('module_color_h1');
		}

		if (isset($this->request->post['module_color_h2'])) {
			$data['module_color_h2'] = $this->request->post['module_color_h2'];
		} else {
			$data['module_color_h2'] = $this->config->get('module_color_h2');
		}

		if (isset($this->request->post['module_color_h3'])) {
			$data['module_color_h3'] = $this->request->post['module_color_h3'];
		} else {
			$data['module_color_h3'] = $this->config->get('module_color_h3');
		}

		if (isset($this->request->post['module_color_h4'])) {
			$data['module_color_h4'] = $this->request->post['module_color_h4'];
		} else {
			$data['module_color_h4'] = $this->config->get('module_color_h4');
		}

		if (isset($this->request->post['module_color_h5'])) {
			$data['module_color_h5'] = $this->request->post['module_color_h5'];
		} else {
			$data['module_color_h5'] = $this->config->get('module_color_h5');
		}

		if (isset($this->request->post['module_color_h6'])) {
			$data['module_color_h6'] = $this->request->post['module_color_h6'];
		} else {
			$data['module_color_h6'] = $this->config->get('module_color_h6');
		}

		if (isset($this->request->post['module_color_p'])) {
			$data['module_color_p'] = $this->request->post['module_color_p'];
		} else {
			$data['module_color_p'] = $this->config->get('module_color_p');
		}
        
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/colors', $data));
	}

	public function fonts() {
		
		$this->load->language('extension/module/style_configuration');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->document->addStyle('https://fonts.googleapis.com/css?family=Montserrat|Merriweather|Josefin+Sans|Arvo|Raleway|Catamaran|PT+Sans|Open+Sans|Roboto+Slab|Ubuntu');

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_font_style', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/style_configuration/fonts', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_font'),
			'href' => $this->url->link('extension/module/style_configuration/fonts', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/module/style_configuration/fonts', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

		if (isset($this->request->post['module_font_style_h1'])) {
			$data['module_font_style_h1'] = $this->request->post['module_font_style_h1'];
		} else {
			$data['module_font_style_h1'] = $this->config->get('module_font_style_h1');
		}

		if (isset($this->request->post['module_font_style_h2'])) {
			$data['module_font_style_h2'] = $this->request->post['module_font_style_h2'];
		} else {
			$data['module_font_style_h2'] = $this->config->get('module_font_style_h2');
		}

		if (isset($this->request->post['module_font_style_h3'])) {
			$data['module_font_style_h3'] = $this->request->post['module_font_style_h3'];
		} else {
			$data['module_font_style_h3'] = $this->config->get('module_font_style_h3');
		}

		if (isset($this->request->post['module_font_style_h4'])) {
			$data['module_font_style_h4'] = $this->request->post['module_font_style_h4'];
		} else {
			$data['module_font_style_h4'] = $this->config->get('module_font_style_h4');
		}

		if (isset($this->request->post['module_font_style_h5'])) {
			$data['module_font_style_h5'] = $this->request->post['module_font_style_h5'];
		} else {
			$data['module_font_style_h5'] = $this->config->get('module_font_style_h5');
		}

		if (isset($this->request->post['module_font_style_h6'])) {
			$data['module_font_style_h6'] = $this->request->post['module_font_style_h6'];
		} else {
			$data['module_font_style_h6'] = $this->config->get('module_font_style_h6');
		}

		if (isset($this->request->post['module_font_style_p'])) {
			$data['module_font_style_p'] = $this->request->post['module_font_style_p'];
		} else {
			$data['module_font_style_p'] = $this->config->get('module_font_style_p');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/module/fonts', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/style_configuration')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}