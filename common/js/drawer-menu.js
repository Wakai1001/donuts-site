'use strict';

// header領域

const hamburger = document.querySelector('#hamburger_menu');
const hamburger_top = document.querySelector('.nav_icon_top');
const hamburger_center = document.querySelector('.nav_icon_center');
const hamburger_bottom = document.querySelector('.nav_icon_bottom');
const drawer = document.querySelector('.drawer_design');
const drawer_close_button = document.querySelector('.drawer_close_button');

// メニューの表示変化
const menu_design = () => {
  // ハンバーガーメニューの形状変化
  hamburger_top.classList.toggle('top_change');
  hamburger_center.classList.toggle('center_change');
  hamburger_bottom.classList.toggle('bottom_change');
  // ドロワーメニューの表示
  drawer.classList.toggle('drawer_open');
};

// ボタンをクリックした時にそれぞれのメニューの表示が変わる
hamburger.addEventListener('click', menu_design);
drawer_close_button.addEventListener('click', menu_design);