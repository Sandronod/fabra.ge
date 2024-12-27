(() => {
    const tabs = document.querySelectorAll('[data-tab-target]')
    const tabContents = document.querySelectorAll('[data-tab-content]')

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const target = document.querySelector(tab.dataset.tabTarget)
            tabContents.forEach((tabContent) => {
                tabContent.classList.remove('active')
            })
            tabs.forEach((tab) => {
                tab.classList.remove('active')
            })
            tab.classList.add('active')
            target.classList.add('active')
        })
    })

    // filter dropdown
    function filterDropdown() {
        if (!document.querySelector('.filter-dropdown')) return

        const dropdowns = document.querySelectorAll('.filter-dropdown')

        dropdowns.forEach((dropdown) => {
            const trigger = dropdown.querySelector('[dropdown-trigger]')
            const options = dropdown.querySelectorAll('.filter-options button')

            trigger.addEventListener('click', () => {
                dropdown.classList.toggle('active')
            })

            options.forEach((option) => {
                option.addEventListener('click', () => {
                    // update filter button chosen option
                    const optionInnerContent = option.innerHTML
                    trigger.querySelector('div').innerHTML = optionInnerContent

                    // close dropdown
                    dropdown.classList.remove('active')

                    // submit api call from here
                    // console.log(option.value)
                })
            })
        })
    }

    /*  function currencyDropdown() {
        if (!document.querySelector('.dropdown')) return

        const dropdowns = document.querySelectorAll('.dropdown')

        dropdowns.forEach((dropdown) => {
          const trigger = dropdown.querySelector('[dropdown-trigger]')
          const options = dropdown.querySelectorAll('.dropdown-options button')

          trigger.addEventListener('click', () => {
            dropdown.classList.toggle('active')
          })

          options.forEach((option) => {
            option.addEventListener('click', () => {
              // update filter button chosen option
              const optionInnerContent = option.innerHTML
              trigger.querySelector('div').innerHTML = optionInnerContent

              // close dropdown
              dropdown.classList.remove('active')

              // submit api call from here
              console.log(option.value)
            })
          })
        })
      }
    */
    // show more of table content
    // function showMore() {
    //     if (!document.querySelector('.show-more')) return

    //     const btns = document.querySelectorAll('.show-more')

    //     btns.forEach((btn) => {
    //         const table = btn.closest('.exchange').querySelector('.exchange-table')
    //         btn.addEventListener('click', () => {
    //             table.classList.toggle('active')
    //         })
    //     })
    // }

    // datepicker
    function datepicker() {
        if (!document.querySelector('.filter-by-date')) return

        const datefilters = document.querySelectorAll('.filter-by-date')
        datefilters.forEach((filter) => {
            const input = filter.querySelector('input')
            const chosenDate = filter.querySelector('button span')

            input.addEventListener('change', () => {
                const inputValue = input.value
                chosenDate.innerHTML = inputValue
            })
        })
    }

    filterDropdown()
        // currencyDropdown()
    // showMore()
    datepicker()
})()


$(document).mouseup(function(e) {

    var filterDropdownEl = $('.filter-dropdown');

    // if the target of the click isn't the filterDropdownEl nor a descendant of the filterDropdownEl
    if (! filterDropdownEl.is(e.target) && filterDropdownEl.has(e.target).length === 0) {
        filterDropdownEl.removeClass('active');
    }

});


$('.burger-bar-menu-header .header-navvigation-scroll-btn').click(function() {

});

$('.header-navvigation-scroll-btn').click(function() {
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 1200);
});


var scrollTopBtn = $('#scroll-top-btn');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    scrollTopBtn.addClass('show');
  } else {
    scrollTopBtn.removeClass('show');
  }
});

scrollTopBtn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});