<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery Landing Page</title>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <script src="{{ asset('resources/js/app.js') }}" defer></script>
</head>
<body class="flex flex-col min-h-screen">
<nav class="bg-primary text-primary-foreground">
    <div class="container mx-auto px-4">
        <ul class="flex justify-center space-x-6 py-4">
            <li><a href="#home" class="hover:underline">Home</a></li>
            <li><a href="#gallery" class="hover:underline">Gallery</a></li>
            <li><a href="#details" class="hover:underline">Details</a></li>
            <li><a href="#contact" class="hover:underline">Contact</a></li>
        </ul>
    </div>
</nav>

<header id="home" class="bg-gradient-to-r from-primary to-secondary text-primary-foreground py-24">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Our Image Gallery</h1>
        <p class="text-xl mb-8">Discover and download beautiful images</p>
        <a href="#gallery"
           class="bg-white text-primary px-6 py-2 rounded-md font-semibold hover:bg-opacity-90 transition-colors">Explore
            Gallery</a>
    </div>
</header>

<main class="flex-grow">
    <section id="gallery" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Our Gallery</h2>

            @foreach($pictures as $pct)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="relative group">
                        <img src="/storage/{{ $pct->picture }}" alt="Image 1"
                             class="w-full h-auto rounded-lg shadow-md transition-transform duration-300 group-hover:scale-105">
                        <a href="{{ route('picture', $pct->picture_slug) }}"
                           class="absolute bottom-4 right-4 bg-primary text-primary-foreground px-4 py-2 rounded-md text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            View Image
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="details" class="py-16 bg-muted">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">About Our Gallery</h2>
            <div class="max-w-2xl mx-auto text-center">
                <p class="mb-4">
                    Our image gallery features a wide range of high-quality images that you can browse and download for
                    free. Whether you're looking for nature scenes, urban landscapes, or abstract art, we've got you
                    covered.
                </p>
                <p>
                    All images are available in high resolution and can be used for both personal and commercial
                    projects. Don't forget to credit the photographers when using their work!
                </p>
            </div>
        </div>
    </section>
</main>

<footer id="contact" class="bg-primary text-primary-foreground py-8">
    <div class="container mx-auto px-4 text-center">
        <p class="mb-2">&copy; <span id="current-year"></span> A Mock for Professionals</p>
        <p>Contact us: oggiesutrisnapro@gmail.com</p>
    </div>
</footer>

</body>
</html>
