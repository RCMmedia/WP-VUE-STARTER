<?php get_header(); ?>


<div id="app">
	<div class="nav">
		<ul>
			<li><router-link to="/">Home</router-link></li>
			<li><router-link to="/posts">Posts</router-link></li>
			<li><router-link to="/locations">Locations</router-link></li>
		</ul>
	</div>
	
<router-view></router-view>


  

</div><!-- app -->

<template id="home-template" v-if="home-template">
	<div>
		<h1>homepage</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</template>

<template id="post-list-template" v-if="post-list-template">
	<div class="post-list-wrap">
	 <div class="single-post" v-for="post in posts">
			<div>{{ post.title.rendered }}</div>
			<div class="repeater-item" v-for="field in post.acf.repeater">
				{{field.text}}<br>
				<img :src="field.image.sizes.thumbnail"/>
			</div><!-- repeater-item -->
			<router-link :to="{ name: 'post', params: { postID: post.id }}">
        Read More
      </router-link>
		</div><!-- single-post -->
	</div><!-- post-list-wrap -->
</template>

<template id="post-single-template">

	<div class="loading" v-if="loading">
  	Loading...
  </div>
  
	<div v-else-if="post" class="post-list-wrap" >
	 <div class="single-post" >
			<div>{{ post.title.rendered }}</div>
			<div class="repeater-item" v-for="field in post.acf.repeater">
				{{field.text}}<br>
				<img :src="field.image.sizes.thumbnail"/>
			</div><!-- repeater-item -->
		</div><!-- single-post -->
	</div><!-- post-list-wrap -->
	
</template>

<template id="location-finder-wrap" v-once>

<div class="bh-sl-container">
      <div id="page-header">
        <h1 class="bh-sl-title">Using Chipotle as an Example</h1>
        <p>I used locations around Minneapolis and the southwest suburbs. So, for example, Edina, Plymouth, Eden Prarie, etc. would be good for testing the functionality.
        You can use just the city as the address - ex: Edina, MN.</p>
      </div>

      <div class="bh-sl-form-container">
        <form id="bh-sl-user-location" method="post" action="#">
            <div class="form-input">
              <label for="bh-sl-address">Enter Address or Zip Code:</label>
              <input type="text" id="bh-sl-address" name="bh-sl-address" />
            </div>

            <button  id="bh-sl-submit" type="submit">Submit</button>
        </form>
      </div>

      <div id="bh-sl-map-container" class="bh-sl-map-container">
        <div id="bh-sl-map" class="bh-sl-map"></div>
        <div class="bh-sl-loc-list">
          <ul class="list"></ul>
        </div>
      </div>
    </div>
    
</template>

<!--
<div class="bh-sl-container" style="display: none">
      <div id="page-header">
        <h1 class="bh-sl-title">Using Chipotle as an Example</h1>
        <p>I used locations around Minneapolis and the southwest suburbs. So, for example, Edina, Plymouth, Eden Prarie, etc. would be good for testing the functionality.
        You can use just the city as the address - ex: Edina, MN.</p>
      </div>

      <div class="bh-sl-form-container">
        <form id="bh-sl-user-location" method="post" action="#">
            <div class="form-input">
              <label for="bh-sl-address">Enter Address or Zip Code:</label>
              <input type="text" id="bh-sl-address" name="bh-sl-address" />
            </div>

            <button  id="bh-sl-submit" type="submit">Submit</button>
        </form>
      </div>

      <div id="bh-sl-map-container" class="bh-sl-map-container">
        <div id="bh-sl-map" class="bh-sl-map"></div>
        <div class="bh-sl-loc-list">
          <ul class="list"></ul>
        </div>
      </div>
    </div>
-->









<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>


<?php get_footer(); ?>