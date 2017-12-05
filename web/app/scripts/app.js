import svg4everybody from 'svg4everybody';
import $ from 'jquery';
import sidebar from '../blocks/sidebar/sidebar';
import navbar from '../blocks/navbar/navbar';

$(() => {
  svg4everybody();
  sidebar;
  navbar;
});

