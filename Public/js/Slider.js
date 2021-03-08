
class Slider {
    constructor() {
        this.currentImage = 0;
        this.images = ["Public/img/slider1.jpg", "Public/img/slider2.jpg", "Public/img/slider3.jpg", "Public/img/slider4.jpg"];
        this.slideImage = document.querySelector('.image');
    }

    changeImage() {
        this.slideImage.src = this.images[this.currentImage];

        if (this.currentImage < this.images.length - 1) {
            this.currentImage++;
        } else {
            this.currentImage = 0;
        }

    }


    //Avec la souris
    prev() {
        document.querySelector('.prev').addEventListener('click', () => {
            if (this.currentImage <= 0)
                this.currentImage = this.images.length;
            this.currentImage--;
            return this.setImg();
        });
    }


    next() {
        document.querySelector('.next').addEventListener('click', () => {
            if (this.currentImage >= this.images.length - 1)

                this.currentImage = -1;
            this.currentImage++;
            return this.setImg();
        });

    }

    //Avec le clavier
    keyDown() {
        document.addEventListener('keydown', (event) => {
            if (event.keyCode == 37) {
                if (this.currentImage <= 0)
                    this.currentImage = this.images.length;
                this.currentImage--;
                return this.setImg();

            } else if (event.keyCode == 39) {
                this.changeImage();
            }
        });
    }

    setImg() {
        return document.getElementById('slider-img').setAttribute('src', this.images[this.currentImage]);
    }


}

const mySlider = new Slider();
mySlider.changeImage();
mySlider.prev();
mySlider.next();
mySlider.keyDown();