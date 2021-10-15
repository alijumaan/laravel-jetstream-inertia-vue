@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', 'غير مصرح لك هذا، فضلا تواصل مع مدير النظام' ?: 'Forbidden')
@section('button', 'الصفحة الرئيسية')
