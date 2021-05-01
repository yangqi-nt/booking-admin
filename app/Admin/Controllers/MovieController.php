<?php

namespace App\Admin\Controllers;

use App\Movie;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movie';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('small_title', __('Small title'));
        $grid->column('image', __('Image'))->image();
        $grid->column('content', __('Content'))->display(function ($content) {
           return mb_substr($content, 0, 100) . '...';
        });
        $grid->column('vote_start', __('Vote start'));
        $grid->column('vote_end', __('Vote end'));
        $grid->column('price', __('Price'));
        $grid->column('price_back', __('Price back'));
        $grid->column('seats', __('Seats'));
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
        $show = new Show(Movie::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('small_title', __('Small title'));
        $show->field('image', __('Image'));
        $show->field('content', __('Content'));
        $show->field('vote_start', __('Vote start'));
        $show->field('vote_end', __('Vote end'));
        $show->field('price', __('Price'));
        $show->field('price_back', __('Price back'));
        $show->field('seats', __('Seats'));
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
        $form = new Form(new Movie());

        $form->text('title', __('Title'));
        $form->text('small_title', __('Small title'));
        $form->image('image', __('Image'))->uniqueName()->move('public');
        $form->editor('content');
        $form->datetime('vote_start', __('Vote start'))->default(date('Y-m-d H:i:s'));
        $form->datetime('vote_end', __('Vote end'))->default(date('Y-m-d H:i:s'));
        $form->number('price', __('Price'));
        $form->number('price_back', __('Price back'));
        $form->number('seats', __('Seats'))->default(10);

        return $form;
    }
}
