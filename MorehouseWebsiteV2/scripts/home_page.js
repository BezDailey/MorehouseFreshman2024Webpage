$(document).ready(function(){
    //Code to make the book slideshow function
    $bookSlides = $(".book_slide");
    $bookNext = $(".book_next");
    $bookPrev = $(".book_prev");
    var totalBooks = $bookSlides.length;
    var currentBookSlideIndex = 0;
    changeBookSlide(currentBookSlideIndex, totalBooks);
    $bookNext.on("click", function() {
        nextBookSlideIndex = currentBookSlideIndex + 1;
        if(nextBookSlideIndex > 0 && nextBookSlideIndex < totalBooks) {
            currentBookSlideIndex++;
            changeBookSlide(currentBookSlideIndex, totalBooks);
       }
    });
    $bookPrev.on("click", function() {
        nextBookSlideIndex = currentBookSlideIndex - 1;
        if(nextBookSlideIndex > -1 && nextBookSlideIndex < totalBooks) {
            currentBookSlideIndex--;
            changeBookSlide(currentBookSlideIndex, totalBooks);
        }
    });

    //functions for the academic calendar schedule slideshow
    totalEvents = $(".event_slide").length;
    $eventNext = $(".event_next");
    $eventPrev = $(".event_prev");
    var currentEventSlideIndex = 0;
    changeEventSlide(currentEventSlideIndex, totalEvents);
    $eventNext.on("click", function() {
        nextEventSlideIndex = currentEventSlideIndex + 1;
        if(nextEventSlideIndex > 0 && nextEventSlideIndex < totalEvents) {
            currentEventSlideIndex++;
            changeEventSlide(currentEventSlideIndex, totalEvents);
       }
    });
    $eventPrev.on("click", function() {
        nextEventSlideIndex = currentEventSlideIndex - 1;
        if(nextEventSlideIndex > -1 && nextEventSlideIndex < totalEvents) {
            currentEventSlideIndex--;
            changeEventSlide(currentEventSlideIndex, totalEvents);
        }
    });
});

//functions for the book slideshow

function changeBookSlide(bookSlideIndex, totalBooks) {
    $(".book_slide").hide();
    $(".book_slide").eq(bookSlideIndex).show();
    updateBookCounter(bookSlideIndex, totalBooks);
}

function updateBookCounter(current, totalBooks) {
    $(".book_slide_number").text(`${current + 1} / ${totalBooks}`);
}

//functions for the academic calendar schedule slideshow
function changeEventSlide(eventSlideIndex, totalEvents) {
    $(".event_slide").hide();
    $(".event_slide").eq(eventSlideIndex).show();
    updateEventCounter(eventSlideIndex, totalEvents);
}

function updateEventCounter(current, totalEvents) {
    $(".event_slide_number").text(`${current + 1} / ${totalEvents}`);
}