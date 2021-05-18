<?php

namespace App\Admin\Controllers;

use App\Booking;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Booking';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Booking());

        $grid->column('id', __('Id'));
        $grid->column('vote_id', __('Vote id'));
        $grid->column('user_id', __('User id'));
        $grid->column('status', __('Status'));
        $grid->column('pay', __('Pay'));
        $grid->column('comment', __('Comment'));
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
        $show = new Show(Booking::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('movie_id', __('Vote id'));
        $show->field('user_id', __('User id'));
        $show->field('status', __('Status'));
        $show->field('pay', __('Pay'));
        $show->field('comment', __('Comment'));
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
        $form = new Form(new Booking());

        $form->number('movie_id', __('Vote id'));
        $form->number('user_id', __('User id'));
        $form->number('status', __('Status'));
        $form->number('pay', __('Pay'));
        $form->text('comment', __('Comment'));

        return $form;
    }
}
