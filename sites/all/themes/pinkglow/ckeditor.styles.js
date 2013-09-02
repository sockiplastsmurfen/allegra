if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'pinkglow',
    [
  {name: 'Body Text (P)', element: 'p'},
  {name: 'Lead Parapraph', element: 'p', attributes: {'class': 'lead-paragraph'}},
  {name: 'Heading (H2)', element: 'h2'}, 
  {name: 'Heading (H3)', element: 'h3'}, 
  {name: 'Button Link', element: 'a', attributes: {'class': 'button'}},
  {name: 'No icon', element: 'a', attributes: {'class': 'nolink'}},
  {name: 'Standard Link', element: 'a', attributes: {'class': ''}},
  {name: 'Right Aligned Image', element : 'img', attributes: {'class' : 'img-align-right'}},
  {name: 'Left Aligned Image', element : 'img', attributes: {'class' : 'img-align-left'}},
  {name: 'Image Size 745px', element : 'img', styles: {'width': '745px'}},
  {name: 'Image Size 350px', element : 'img', styles: {'width': '350px'}},
  {name: 'Original Image', element : 'img', attributes : {'class': ''}},
  {name: 'Color Plate Pink', element : 'div', attributes: {'class' : 'plate-pink'}},
  
  {name: 'Phone icon', element : 'span', attributes: {'class' : 'icon-phone'}},
  
  {name: 'Mail link', element : 'span', attributes: {'class' : 'icon-mail'}},
  {name: 'Facebook link', element : 'a', attributes: {'class' : 'icon-facebook'}},
  {name: 'Instagram link', element : 'a', attributes: {'class' : 'icon-instagram'}},
  {name: 'Twitter link', element : 'a', attributes: {'class' : 'icon-twitter'}},
  {name: 'Pinterest link', element : 'a', attributes: {'class' : 'icon-pinterest'}},
  {name: 'Google+ link', element : 'a', attributes: {'class' : 'icon-google-plus'}},
  {name: 'Linkedin link', element : 'a', attributes: {'class' : 'icon-linkedin'}}
      ]);
  }