var grids = [];
grids.app = angular.module("theGrid", ['ngResource','ngAnimate','minicolors']);

grids.app.value('site_url','http://192.168.100.18/theGrid/index.php/');
grids.app.value('site_path','http://192.168.100.18/theGrid/');

grids.app.config(function (minicolorsProvider) {
  angular.extend(minicolorsProvider.defaults, {
    control: 'hue',
    position: 'bottom left'
  });
});