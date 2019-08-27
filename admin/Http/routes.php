<?php

$router->get('/information', ['as' => 'admin.information', function (\SleepingOwl\Admin\Contracts\Template\TemplateInterface $template) {

    return $template->view(
	    'Define your information here.',
        'Information'
    );

}]);

$router->post('/news/export.json', ['as' => 'admin.news.export', function (\Illuminate\Http\Request $request) {

    $response = new \Illuminate\Http\JsonResponse([
		'title' => 'Congratulation! You exported news.',
		'news' => App\Model\News5::whereIn('id', $request->_id)->get()
	]);

	return $response;

}]);

$router->any('ajax/model/{adminModel}/{adminModelId}/edit', ['as' => 'admin.ajax.model.edit',
    function (\SleepingOwl\Admin\Contracts\ModelConfigurationInterface $adminModel, $adminModelId) {

        $model = $adminModel->getClass();

        $section = \AdminSection::getModel($model);

        $section = $section
            ->fireEdit($adminModelId)
            ->render()
        ;
        return $section;
    }
]);