import { useState } from "react";
import Cropper from "react-easy-crop";
import PrimaryButton from "../buttons/PrimaryButton";
import SecondaryButton from "../buttons/SecondaryButton";
import Modal from "../Modal";

const ImageCropper = ({ image, show, onClose, onCropDone, onCropCancel }) => {
  const [crop, setCrop] = useState({ x: 0, y: 0 });
  const [zoom, setZoom] = useState(1);
  const [croppedArea, setCroppedArea] = useState(null);
  const [aspectRatio, setAspectRatio] = useState(4 / 3);

  const onCropComplete = (_, croppedAreaPixels) => {
    setCroppedArea(croppedAreaPixels);
  };

  const handleCropDone = () => {
    if (croppedArea) {
      onCropDone(croppedArea);
    } else {
      console.error("No cropped area to save.");
    }
  };

  const handleCropCancel = () => {
    onCropCancel();
  };

  return (
    <Modal show={show} onClose={onClose} maxWidth="xl">
      <div className="p-4">
        <div className="relative w-full h-64 bg-gray-200">
          <Cropper
            image={image}
            aspect={aspectRatio}
            crop={crop}
            zoom={zoom}
            onCropChange={setCrop}
            onZoomChange={setZoom}
            onCropComplete={onCropComplete}
          />
        </div>
        <div className="mt-4 flex justify-end gap-2">
          <SecondaryButton onClick={handleCropCancel}>Cancel</SecondaryButton>
          <PrimaryButton onClick={handleCropDone}>Crop & Save</PrimaryButton>
        </div>
      </div>
    </Modal>
  );
};

export default ImageCropper;
