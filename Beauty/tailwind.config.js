module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
   theme: {
    extend: {
      backgroundImage: theme => ({
        'hero-image': "url('https://classpass-res.cloudinary.com/image/upload/f_auto/q_auto/f8c29bk02jmx0ihukmb1.jpg')",
        'salon-image': "url('https://www.byrdie.com/thmb/0nSkcCCvoPE8mUzKJ-7RJH-sf64=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/OliveJune-23746c4d1e7949ffbae06bf09ed241bf.jpg')",
        'hero-image2': "url('https://classpass-res.cloudinary.com/image/upload/f_auto/q_auto/f8c29bk02jmx0ihukmb1.jpg')"
      }),
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
