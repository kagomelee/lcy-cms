<?php

namespace App\Admin\Controllers;

use App\Models\ArticleCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
//use Encore\Admin\Grid;
//use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class ArticleCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'All categories';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title($this->title)
            ->body($this->tree());
    }

    /**
     * Make a grid builder.
     *
     * @return Tree
     */
    protected function tree()
    {
        return ArticleCategory::tree(function (Tree $tree) {

            $tree->branch(function ($branch) {

                $src = config('admin.upload.host') . '/' . $branch['icon'] ;

                $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

                return "{$branch['id']} - {$branch['name']} $logo";

            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ArticleCategory());

        $form->display('id', 'ID');

        $form->select('parent_id')->options(ArticleCategory::selectOptions());

        $form->text('name')->rules('required');
	$form->text('short_name','Short Name')->rules('required');
	$form->textarea('summary','Summary')->rules('required');	
        $form->textarea('desc')->rules('required');
        //$form->image('icon');
	$form->image('cover');
	$form->number('order');

        $form->display('created_at', 'Created At');
        $form->display('updated_at', 'Updated At');

        return $form;
    }
    
    
    
//    protected function grid()
//    {
//        $grid = new Grid(new ArticleCategory);
//
//        $grid->column('id', __('Id'));
//        $grid->column('parent_id', __('Parent id'));
//        $grid->column('order', __('Order'));
//        $grid->column('name', __('Name'));
//        $grid->column('short_name', __('Short name'));
//        $grid->column('summary', __('Summary'));
//        $grid->column('desc', __('Desc'));
//        $grid->column('cover', __('Cover'));
//        $grid->column('icon', __('Icon'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));
//
//        return $grid;
//    }
//
//    /**
//     * Make a show builder.
//     *
//     * @param mixed $id
//     * @return Show
//     */
//    protected function detail($id)
//    {
//        $show = new Show(ArticleCategory::findOrFail($id));
//
//        $show->field('id', __('Id'));
//        $show->field('parent_id', __('Parent id'));
//        $show->field('order', __('Order'));
//        $show->field('name', __('Name'));
//        $show->field('short_name', __('Short name'));
//        $show->field('summary', __('Summary'));
//        $show->field('desc', __('Desc'));
//        $show->field('cover', __('Cover'));
//        $show->field('icon', __('Icon'));
//        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));
//
//        return $show;
//    }
//
//    /**
//     * Make a form builder.
//     *
//     * @return Form
//     */
//    protected function form()
//    {
//        $form = new Form(new ArticleCategory);
//
//        $form->number('parent_id', __('Parent id'));
//        $form->number('order', __('Order'));
//        $form->text('name', __('Name'));
//        $form->text('short_name', __('Short name'));
//        $form->text('summary', __('Summary'));
//        $form->textarea('desc', __('Desc'));
//        $form->image('cover', __('Cover'));
//        $form->text('icon', __('Icon'));
//
//        return $form;
//    }
}
