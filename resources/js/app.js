/*
|--------------------------------------------------------------------------
| WEDDING INVITATION
| MAIN JAVASCRIPT
|--------------------------------------------------------------------------
*/


document.addEventListener('DOMContentLoaded', () => {


    /*
    |--------------------------------------------------------------------------
    | ELEMENTS
    |--------------------------------------------------------------------------
    */

    const openingScreen =
        document.getElementById('openingScreen');

    const openInvitation =
        document.getElementById('openInvitation');

    const music =
        document.getElementById('weddingMusic');

    const musicButton =
        document.getElementById('musicButton');

    const musicIcon =
        document.getElementById('musicIcon');


    /*
    |--------------------------------------------------------------------------
    | MUSIC
    |--------------------------------------------------------------------------
    */

    let isPlaying = false;


    if (music && musicButton) {

        musicButton.addEventListener(
            'click',
            async () => {

                if (isPlaying) {

                    music.pause();

                    isPlaying = false;

                    if (musicIcon) {
                        musicIcon.textContent = '♪';
                    }

                    musicButton.setAttribute(
                        'aria-label',
                        'Putar musik'
                    );

                } else {

                    try {

                        await music.play();

                        isPlaying = true;

                        if (musicIcon) {
                            musicIcon.textContent = 'Ⅱ';
                        }

                        musicButton.setAttribute(
                            'aria-label',
                            'Jeda musik'
                        );

                    } catch (error) {

                        console.log(
                            'Musik belum dapat diputar:',
                            error
                        );

                    }

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | OPENING
    |--------------------------------------------------------------------------
    */

    if (
        openingScreen &&
        openInvitation
    ) {

        /*
        Lock scrolling while opening
        */

        document.body.classList.add(
            'overflow-hidden'
        );


        openInvitation.addEventListener(
            'click',
            async (event) => {

                event.preventDefault();

                event.stopPropagation();


                /*
                ----------------------------------------------
                PLAY MUSIC
                ----------------------------------------------
                */

                if (music) {

                    try {

                        await music.play();

                        isPlaying = true;

                        if (musicIcon) {
                            musicIcon.textContent = 'Ⅱ';
                        }

                        if (musicButton) {

                            musicButton.setAttribute(
                                'aria-label',
                                'Jeda musik'
                            );

                        }

                    } catch (error) {

                        console.log(
                            'Musik belum dapat diputar:',
                            error
                        );

                    }

                }


                /*
                ----------------------------------------------
                HIDE OPENING
                ----------------------------------------------
                */

                openingScreen.classList.add(
                    'opacity-0',
                    'pointer-events-none'
                );


                /*
                ----------------------------------------------
                REMOVE OPENING
                ----------------------------------------------
                */

                setTimeout(() => {

                    openingScreen.remove();

                    document.body.classList.remove(
                        'overflow-hidden'
                    );

                }, 700);

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | GALLERY LIGHTBOX
    |--------------------------------------------------------------------------
    */

    const galleryItems =
        document.querySelectorAll(
            '.gallery-item'
        );

    const lightbox =
        document.getElementById(
            'lightbox'
        );

    const lightboxImage =
        document.getElementById(
            'lightboxImage'
        );

    const closeLightbox =
        document.getElementById(
            'closeLightbox'
        );


    function closeGalleryLightbox() {

        if (!lightbox) {
            return;
        }


        lightbox.classList.add(
            'hidden'
        );

        lightbox.classList.remove(
            'flex'
        );


        if (lightboxImage) {

            lightboxImage.src = '';

        }


        document.body.classList.remove(
            'overflow-hidden'
        );

    }


    galleryItems.forEach(
        (item) => {

            item.addEventListener(
                'click',
                () => {

                    const image =
                        item.dataset.image;


                    if (
                        !image ||
                        !lightbox ||
                        !lightboxImage
                    ) {
                        return;
                    }


                    lightboxImage.src =
                        image;


                    lightbox.classList.remove(
                        'hidden'
                    );

                    lightbox.classList.add(
                        'flex'
                    );


                    document.body.classList.add(
                        'overflow-hidden'
                    );

                }
            );

        }
    );


    if (closeLightbox) {

        closeLightbox.addEventListener(
            'click',
            closeGalleryLightbox
        );

    }


    if (lightbox) {

        lightbox.addEventListener(
            'click',
            (event) => {

                if (
                    event.target === lightbox
                ) {

                    closeGalleryLightbox();

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | ESCAPE
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        (event) => {

            if (
                event.key !== 'Escape'
            ) {
                return;
            }


            if (
                lightbox &&
                !lightbox.classList.contains(
                    'hidden'
                )
            ) {

                closeGalleryLightbox();

                return;

            }


            closeRsvpMessage();

        }
    );

});


/*
|--------------------------------------------------------------------------
| RSVP MESSAGE MODAL
|--------------------------------------------------------------------------
*/

function openRsvpMessage(
    message,
    name
) {

    const modal =
        document.getElementById(
            'rsvpMessageModal'
        );

    const messageContent =
        document.getElementById(
            'rsvpMessageContent'
        );

    const messageName =
        document.getElementById(
            'rsvpMessageName'
        );


    if (
        !modal ||
        !messageContent ||
        !messageName
    ) {

        return;

    }


    messageContent.textContent =
        message || '-';

    messageName.textContent =
        name || 'Pengisi RSVP';


    modal.classList.remove(
        'hidden'
    );

    modal.classList.add(
        'flex'
    );


    document.body.classList.add(
        'overflow-hidden'
    );

}


function closeRsvpMessage() {

    const modal =
        document.getElementById(
            'rsvpMessageModal'
        );


    if (!modal) {
        return;
    }


    modal.classList.add(
        'hidden'
    );

    modal.classList.remove(
        'flex'
    );


    document.body.classList.remove(
        'overflow-hidden'
    );

}
document.addEventListener("DOMContentLoaded",()=>{


const navigation =
document.getElementById("navigationWrapper");


const cover =
document.getElementById("cover");


if(!navigation || !cover) return;



window.addEventListener("scroll",()=>{


    const coverBottom =
    cover.offsetTop + cover.offsetHeight;



    if(window.scrollY > coverBottom - 150){


        navigation.classList.remove("hidden");


    }
    else{


        navigation.classList.add("hidden");


    }


});


});