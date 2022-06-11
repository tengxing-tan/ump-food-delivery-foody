/**
* Preview food image
*/
function updateImageDisplay() {
  const file = document.getElementById('input-food-image').files;
  const preview = document.getElementById('preview');
  for (const obj of file) {
    preview.src = URL.createObjectURL(obj);
  }
}
