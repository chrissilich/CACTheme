<template>
  <div class="slideshow">
    <template v-for="(slide, i) in normalSlides">
      <Transition>
        <div
          v-if="slideIndex == i && !collectionSlideNow"
          class="slideshow-slide slideshow-slide--normal"
        >
          <!-- normal slide {{ i }} -->
          <img
            :src="slide.url"
            :alt="slide.alt"
            class="slideshow-slide-image"
            :style="`object-position: ${slide.x}% ${slide.y}%`"
          />
        </div>
      </Transition>
    </template>
    <template v-for="(slide, i) in collectionSlides">
      <Transition>
        <div
          v-if="collectionSlideIndex === i && collectionSlideNow"
          class="slideshow-slide slideshow-slide--collection"
        >
          <!-- collection slide {{ i }} -->
          <div class="slideshow-slide-column a">
            <img
              :src="slide.a.url"
              class="slideshow-slide-image"
              :alt="slide.a.alt"
              :style="`object-position: ${slide.a.x}% ${slide.a.y}%`"
            />
          </div>
          <div class="slideshow-slide-column b">
            <img
              :src="slide.b.url"
              class="slideshow-slide-image"
              :alt="slide.b.alt"
              :style="`object-position: ${slide.b.x}% ${slide.b.y}%`"
            />
          </div>
          <div class="slideshow-slide-column c">
            <img
              :src="slide.c.url"
              class="slideshow-slide-image"
              :alt="slide.c.alt"
              :style="`object-position: ${slide.c.x}% ${slide.c.y}%`"
            />
          </div>
        </div>
      </Transition>
    </template>
  </div>
  <!-- <div>
		slideIndex: {{ slideIndex }}<br />
		collectionSlideNow: {{ collectionSlideNow }}<br />
		collectionSlideIndex: {{ collectionSlideIndex }}<br />
	</div> -->
</template>

<script setup>
/*
 *
 * The homepage slideshow
 * In hindsight, this probably didn't need to be in Vue, but it was still a good exercise in
 * how compile Vue apps into the JS that deploys with a Wordpress theme, and how to mount
 * those Vue apps to the DOM in a Wordpress site.
 *
 */
import { ref } from "vue";

const props = defineProps({});
const slideTime = ref(cac_home_time_between_slides * 1000);
const collectionSlideFrequency = ref(cac_home_collection_slide_rate);

const normalSlides = ref(cac_home_regular_slides);
const collectionSlides = ref(cac_home_collection_slides);

const slideIndex = ref(Math.floor(Math.random() * normalSlides.value.length));
const collectionSlideIndex = ref(0);
const collectionSlideNow = ref(false);

const nextSlide = () => {
  if (collectionSlideNow.value) {
    // we were on a collection slide
    collectionSlideNow.value = false;
    slideIndex.value = slideIndex.value + 1;
    if (slideIndex.value >= normalSlides.value.length) {
      slideIndex.value = 0;
    }
  } else {
    // we were on a normal slide
    if (slideIndex.value % collectionSlideFrequency.value === 0) {
      // it's time for a collection slide
      collectionSlideNow.value = true;
      collectionSlideIndex.value = collectionSlideIndex.value + 1;
      if (collectionSlideIndex.value >= collectionSlides.value.length) {
        collectionSlideIndex.value = 0;
      }
    } else {
      // just move to the next normal slide
      slideIndex.value = slideIndex.value + 1;
      if (slideIndex.value >= normalSlides.value.length) {
        slideIndex.value = 0;
      }
    }
  }

  // Call out to vanilla JS logo component
  if (collectionSlideNow.value) {
    window.changeHeaderLogo(
      collectionSlides.value[collectionSlideIndex.value].collection,
      50
    );
  } else {
    window.changeHeaderLogo(
      null,
      normalSlides.value[slideIndex.value].opacity_of_box_behind_logo
    );
  }
};

const intervalID = setInterval(nextSlide, slideTime.value);
window.addEventListener("keyup", (e) => {
  if (e.key === "`") {
    clearInterval(intervalID);
    nextSlide();
  }
});
</script>
