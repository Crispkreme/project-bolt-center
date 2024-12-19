import InputError from '@/Components/inputs/InputError';
import InputLabel from '@/Components/inputs/InputLabel';
import PrimaryButton from '@/Components/buttons/PrimaryButton';
import DangerButton from '@/Components/buttons/DangerButton';
import SecondaryButton from '@/Components/buttons/SecondaryButton';
import TextInput from '@/Components/inputs/TextInput';
import Combobox from '@/Components/inputs/Combobox';
import { Link, useForm, usePage } from '@inertiajs/react';
import Textarea from '@/Components/inputs/Textarea';
import { useRef, useState } from 'react';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';
import ImageCropper from '@/Components/image/ImageCropper';
import { toast } from "react-hot-toast";
import { genders, statuses } from '@/Constants';

export default function UpdateProfileInformation({
    mustVerifyEmail,
    status,
    className = '',
}) {
    const inputRef = useRef();
    const user = usePage().props.auth.user;
    const [startDate, setStartDate] = useState(user.birthday || '');
    const [image, setImage] = useState();
    const [imageModal, setImageModal] = useState(false);
    const [currentPage, setCurrentPage] = useState();
    const { data, setData, post, errors, processing } = useForm({
        name: user.name || '',
        email: user.email || '',
        gender: user.gender || '',
        birthday: user.birthday || '',
        civil_status: user.civil_status || '',
        religion: user.religion || '',
        address: user.address || '',
        profile: user.profile || ''
    });

    const calculateAge = (birthdate) => {
        const today = new Date();
        const birthDate = new Date(birthdate);
        let age = today.getFullYear() - birthDate.getFullYear();
        const month = today.getMonth();
        const day = today.getDate();

        if (month < birthDate.getMonth() || (month === birthDate.getMonth() && day < birthDate.getDate())) {
            age--;
        }

        return age;
    };
    const handleChange = (date) => {
        setStartDate(date);
        setData('birthday', date);

        const age = calculateAge(date);
        setData('age', age);
    };
    const handleImageUpload = (event) => {
        if (event.target.files && event.target.files.length > 0) {
            const reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            reader.onload = function () {
                setImage(reader.result);
                setCurrentPage("crop-img");
                setImageModal(true);
            };
        }
    };
    const handleCropDone = (croppedArea) => {
        console.log("Cropped area:", croppedArea);
        setImageModal(false);
    
        const canvas = document.createElement('canvas');
        canvas.width = croppedArea.width;
        canvas.height = croppedArea.height;
        const ctx = canvas.getContext('2d');
    
        const imageObj = new Image();
        imageObj.src = image; 
        imageObj.onload = () => {
            ctx.drawImage(
                imageObj,
                croppedArea.x,
                croppedArea.y,
                croppedArea.width,
                croppedArea.height,
                0,
                0,
                croppedArea.width,
                croppedArea.height
            );
    
            const croppedImage = canvas.toDataURL('image/jpeg');
            const file = dataURLtoFile(croppedImage, 'profile.jpg');
            setData('profile', file);
        };
    };
    const dataURLtoFile = (dataUrl, filename) => {
        const arr = dataUrl.split(',');
        const mime = arr[0].match(/:(.*?);/)[1];
        const bstr = atob(arr[1]);
        let n = bstr.length;
        const u8arr = new Uint8Array(n);
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, { type: mime });
    };
    const onChooseImg = () => {
        inputRef.current.click();
    };
    const submit = (e) => {
        e.preventDefault();

        const formattedData = {
            address: data.address,
            age: data.age,
            birthday: data.birthday.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }),
            civil_status: data.civil_status,
            email: data.email,
            gender: data.gender,
            name: data.name,
            profile: data.profile,
            religion: data.religion,
        };
        console.log('Submitted form data:', formattedData);

        post('profile/create', {
          onSuccess: (response) => {
            const flash = response.props?.flash;
            if (flash?.error) {
              toast.error(flash.error);
            }
    
            if (flash?.success) {
              toast.success(flash.success);
            }
          },
          onError: (errors) => {
            console.error('Failed to book appointment:', errors);
          },
        });
    };

    return (
        <section className="w-full">
            <header>
                <h2 className="text-lg font-medium text-gray-900">Profile Information</h2>
                <p className="mt-1 text-sm text-gray-600">
                    Update your account's profile information and email address.
                </p>
            </header>

            <form onSubmit={submit} className="mt-6 space-y-6 w-full" >
                <div>
                    <InputLabel htmlFor="name" value="Name" />
                    <TextInput
                        id="name"
                        className="mt-1 block w-full"
                        value={data.name}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                        autoComplete="name"
                    />
                    <InputError className="mt-2" message={errors.name} />
                </div>
                <div className="grid grid-cols-4 gap-3">
                    <div>
                        <InputLabel htmlFor="gender" value="Gender" />
                        <Combobox
                            id="gender"
                            options={genders}
                            className="mt-1 w-full"
                            value={data.gender}
                            onChange={(value) => {
                                setData('gender', value);
                                console.log('Selected gender:', value);
                            }}
                        />
                        <InputError className="mt-2" message={errors.gender} />
                    </div>
                    <div>
                        <InputLabel htmlFor="civil_status" value="Civil Status" />
                        <Combobox
                            id="civil_status"
                            options={statuses}
                            className="mt-1 w-full"
                            value={data.civil_status}
                            onChange={(value) => {
                                setData('civil_status', value);
                                console.log('Selected civil status:', value);
                            }}
                        />
                        <InputError className="mt-2" message={errors.civil_status} />
                    </div>
                    <div>
                        <InputLabel htmlFor="birthday" value="Birthdate" />
                        <DatePicker
                            selected={startDate}
                            onChange={handleChange}
                            placeholderText="Birthdate"
                            className="mt-1 w-full rounded-md border-gray-300 shadow-sm"
                            dateFormat="MMMM d, yyyy"
                        />
                        <InputError className="mt-2" message={errors.birthday} />
                    </div>
                    <div>
                        <InputLabel htmlFor="age" value="Age" />
                        <TextInput
                            id="age"
                            className="mt-1 block w-full"
                            value={data.age}
                            disabled
                        />
                        <InputError className="mt-2" message={errors.age} />
                    </div>
                </div>
                <div>
                    <InputLabel htmlFor="religion" value="Religion" />
                    <TextInput
                        id="religion"
                        className="mt-1 block w-full"
                        value={data.religion}
                        onChange={(e) => setData('religion', e.target.value)}
                        required
                        autoComplete="religion"
                    />
                    <InputError className="mt-2" message={errors.religion} />
                </div>
                <div>
                    <InputLabel htmlFor="address" value="Address" />
                    <Textarea
                        id="address"
                        rows={5}
                        value={data.address}
                        onChange={(e) => setData('address', e.target.value)}
                        className="mt-1 block w-full"
                    />
                    <InputError className="mt-2" message={errors.address} />
                </div>
                {mustVerifyEmail && user.email_verified_at === null && (
                    <div>
                        <p className="mt-2 text-sm text-gray-800">
                            Your email address is unverified.
                            <Link
                                href={route('verification.send')}
                                method="post"
                                as="button"
                                className="text-sm text-gray-600 underline"
                            >
                                Click here to re-send the verification email.
                            </Link>
                        </p>
                        {status === 'verification-link-sent' && (
                            <div className="mt-2 text-sm font-medium text-green-600">
                                A new verification link has been sent to your email address.
                            </div>
                        )}
                    </div>
                )}
                <div>
                    <input type="file" accept="image/*" ref={inputRef} onChange={handleImageUpload} style={{ display: 'none' }} />
                </div>
                {currentPage === "crop-img" && imageModal && (
                    <ImageCropper
                        image={image}
                        show={imageModal}
                        onClose={() => setImageModal(false)}
                        onCropDone={handleCropDone}
                        onCropCancel={() => setImageModal(false)}
                    />                  
                )}
                <div className="row flex items-center justify-between gap-4">
                    <SecondaryButton disabled={processing} onClick={onChooseImg}>
                        Upload Profile
                    </SecondaryButton>
                    <div className="flex gap-4">
                        <PrimaryButton disabled={processing}>Save</PrimaryButton>
                        <DangerButton disabled={processing}>Cancel</DangerButton>
                    </div>
                </div>
            </form>
        </section>
    );
}