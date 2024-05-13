module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
   theme: {
    extend: {
      colors: {
        customPink: '#ff4081',
        lightPink: '#FFC4D5',
        contrastPink: '#FF86A9',
        lightBlue: '#81B0E8',
      },
      backgroundImage: theme => ({
        'hero-image': "url('https://classpass-res.cloudinary.com/image/upload/f_auto/q_auto/f8c29bk02jmx0ihukmb1.jpg')",
        'salon-image': "url('https://www.byrdie.com/thmb/0nSkcCCvoPE8mUzKJ-7RJH-sf64=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/OliveJune-23746c4d1e7949ffbae06bf09ed241bf.jpg')",
        'hero-image2': "url('https://classpass-res.cloudinary.com/image/upload/f_auto/q_auto/f8c29bk02jmx0ihukmb1.jpg')",
       'home-page1': "url('https://tint.creativemarket.com/Ui4y9vqSx8a7h8xlwDBGDE5xEmG0hTSkoXc6NClS1fk/width:1820/height:1212/gravity:ce/rt:fill-down/el:1/czM6Ly9maWxlcy5jcmVhdGl2ZW1hcmtldC5jb20vaW1hZ2VzL3NjcmVlbnNob3RzL3Byb2R1Y3RzLzY4Ni82ODY2LzY4NjYwNDAvXzM5YTIyODYtY29weS1vLmpwZw?1566541869&fmt=webp')",
       'nailbglog': "url('https://www.melarossa.it/wp-content/uploads/2017/07/pedicure-.jpg')",
       'nailbglog2': "url('https://usercontent.one/wp/mariannetaylor.co.uk/wp-content/uploads/2021/12/Product-still-life-photography-content-creation-for-Barry-M-Cosmetics.-Beauty-product-photography-styling-by-Marianne-Taylor._0003.jpg?media=1637181377')",
       'heroimg2': "url('https://www.brit.co/media-library/summer-nail-art-ideas.jpg?id=33655397&width=1200&height=600&coordinates=0%2C315%2C0%2C215')",
      }),
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
