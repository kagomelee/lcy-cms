<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->column('id', __('Id'));
        //$grid->column('category_id', __('Category id'));
        $grid->column ('category.name','分类名称 ');
        $grid->column('title', __('Title'));
        $grid->column('short_title', __('Short title'));
        $grid->column('summary', __('Summary'));
        $grid->column('content', __('Content'));
        $grid->column('cover', __('Cover'));
        $grid->column('author', __('Author'));
        $grid->column('order', __('Order'));
        //$grid->column('admin_id', __('Admin id'));
        $grid->column ('admininfo.username','管理员');
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('title', __('Title'));
        $show->field('short_title', __('Short title'));
        $show->field('summary', __('Summary'));
        $show->field('content', __('Content'));
        $show->field('cover', __('Cover'));
        $show->field('author', __('Author'));
        $show->field('order', __('Order'));
        $show->field('admin_id', __('Admin id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
       
        $form = new Form(new Article);
        //$form->number('category_id', __('Category id'));
        $form->select('category_id', __('Category id'))->options(ArticleCategory::selectOptions());
        $form->text('title', __('Title'));
        $form->text('short_title', __('Short title'));
        $form->text('summary', __('Summary'));
        $form->textarea('content', __('Content'));
        $form->image('cover', __('Cover'));
        $form->text('author', __('Author'));
        $form->number('order', __('Order'));
        $form->hidden('admin_id');
        
        $form->saving(function ($form) {
            $form->admin_id = Admin::user()->id;
        });
        //$form->text('admin_id', __('Admin id'))->value(Admin::user()->id);

        return $form;
    }
}
