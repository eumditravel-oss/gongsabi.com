<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Partners 카테고리
function HP_GET_PARTNERS_CATEGORY_TEXT($category)
{
    $CI =& get_instance();

	if ( $category )
	{
		$list = $CI->config->item('PARTNERS_CATEGORY_LIST');

		return $list[$category];	
	}
	else
		return '';
}

// 공사비 작성 의뢰 작업 범위
function HP_GET_GONGSABI_REQUEST_TEXT($category)
{
    $CI =& get_instance();

	if ( $category )
	{
		$list = $CI->config->item('GONGSABI_REQUEST_LIST');

		return $list[$category];	
	}
	else
		return '';
}

// 강의 요청 교육 과정
function HP_GET_LECTURE_TEXT($category)
{
    $CI =& get_instance();

	if ( $category )
	{
		$list = $CI->config->item('LECTURE_LIST');

		if ( array_key_exists($category, $list) )
			return $list[$category]['title'];
		else
			return '<strike>삭제된 강의</strike>';
	}
	else
		return '';	
}