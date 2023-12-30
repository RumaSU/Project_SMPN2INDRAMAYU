$(document).ready(function() {
    $('.itemClass').each(function() {
        var $currentItem = $(this);

        $currentItem.waitForImages(function() {
            $currentItem.find('.contentItems').removeClass('hidden');
            $currentItem.find('.questionSummaryClass').removeClass('hidden');
            $currentItem.find('.lazy-placeholder').remove();
            $currentItem.lazy();
        });
    });
    $('.img-classes').waitForImages(function() {
        $(this).find('.cntnTopImage').removeClass('hidden');
        $(this).find('.lazy-placeholder').remove();
    });
    setTimeout(() => {
        $('.succedSomething').removeClass('translate-x-[125%]');
        $('.updateSomething').removeClass('translate-x-[125%]');
    }, 50);
    setTimeout(() => {
        $('.succedSomething').addClass('translate-x-[125%]');
        $('.updateSomething').addClass('translate-x-[125%]');
    }, 3500);
    setTimeout(() => {
        $('.errorSomething').remove();
        $('.succedSomething').remove();
        $('.updateSomething').remove();
    }, 3600);
});