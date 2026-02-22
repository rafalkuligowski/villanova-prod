const faq = {
    init: () => {
        const faqItems = document.querySelectorAll(".faq-item");
        faqItems.forEach(item => {
            const question = item.querySelector(".faq-question");
            const answer = item.querySelector(".faq-answer");
            const arrow = item.querySelector(".faq-arrow");
            question.addEventListener("click", () => {
                const isOpen = answer.style.maxHeight && answer.style.maxHeight !== "0px";
                if (isOpen) {
                    answer.style.maxHeight = "0";
                    item.classList.add("is-close");
                } else {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    item.classList.remove("is-close");
                }
            })
        })
    }
};

(function($) {
    const mobileMenu = {
        init: () => {
            if ($(window).width() < 993) {
                $(document).on("click", ".menu-arrow", function (event) {
                    $(event.target).closest(".menu-item").children(".menu-level").slideToggle();
                    $(event.target).toggleClass("submenu-active");
                })
                $(document).on("click", "#mobile-header .menu-icon", function (event) {
                    $('#mobile-menu').addClass('is-open');
                })
                $(document).on("click", "#mobile-header .close-menu", function (event) {
                    $('#mobile-menu').removeClass('is-open');
                })
            }
        }
    };

    function solidgroupDomReady(fn) {
        if (typeof fn !== 'function') return;
        if (document.readyState === 'interactive' || document.readyState === 'complete') return fn();
        document.addEventListener('DOMContentLoaded', fn, false);
    }

    solidgroupDomReady(function () {
        faq.init();
        mobileMenu.init();
    });
})(jQuery);
