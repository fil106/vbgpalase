//Ловим нажатие, в блоке с расписанием, кнопки с датой, совершаем определенные действия
$(document).ready(function() {

    $('.get-date').on('click', function(){
        $('.get-date').removeClass('d-active');
        $(this).addClass('d-active');

        var currDate = $(this).attr('date'); //Получаем значение даты по которой кликнули

        $('.sesFilms').css('opacity', '0');

        $.ajax({
            url: 'index.php?date='+currDate,
            type: 'GET',
            success: function(data){
                $('.sesFilms').html(data);
                $('.sesFilms').css('opacity', '1');
            },
            error: function(){
                alert('Ошибка!');
            }
        });
    });
});