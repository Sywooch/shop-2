$('.sidebar__item .products').hide();

$('.show-sidebar-list').click(function () {
  const currentList = $(this).next('.products');

  if (currentList.hasClass('opened-sidebar-list')) {

    currentList.slideToggle(function () {
      $('.show-sidebar-list').removeClass('show-sidebar-list_up');
      $('.opened-sidebar-list').removeClass('opened-sidebar-list');
    });

  }
  else {

    $('.opened-sidebar-list')
      .removeClass('opened-sidebar-list')
      .slideUp();
    $('.show-sidebar-list').removeClass('show-sidebar-list_up');
    $(this).addClass('show-sidebar-list_up');
    currentList.slideToggle().addClass('opened-sidebar-list');
  }
});

new Vue({
  el: '#sidebarTitle',
  data: {
    msg: 'Sidebar'
  },
  methods: {
    toggle: function (item) {
      $(item).hide('slow');
    }
  }
});
