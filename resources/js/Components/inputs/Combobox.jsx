import { forwardRef, useEffect, useImperativeHandle, useRef } from 'react';

const Combobox = forwardRef(({ options = [], className = '', isFocused = false, ...props }, ref) => {
    
    // sample data
    // const genders = [
    //     { name: 'Male', value: 'Male' },
    //     { name: 'Female', value: 'Female' },
    // ];

    const localRef = useRef(null);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <select
            {...props}
            className={`rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ${className}`}
            ref={localRef}
            defaultValue=""
        >
            <option value="" disabled>
                Select an option
            </option>
            {options.map((option, index) => (
                <option key={index} value={option.value} disabled={option.disabled || false}>
                    {option.name || option.label}
                </option>
            ))}
        </select>
    );
});

export default Combobox;
