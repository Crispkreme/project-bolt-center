import { useState } from 'react';
import { usePage } from '@inertiajs/react';
import Dropdown from './inputs/Dropdown';
import NavLink from './inputs/NavLink';
import ResponsiveNavLink from './inputs/ResponsiveNavLink';
import { IoIosArrowDown } from "react-icons/io";
import { TbBellRinging } from "react-icons/tb";

const Header = ({ header }) => {
    const { user, account } = usePage().props.auth ?? { user: {}, account: {} };
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <>
            {/* Top Navigation */}
            <nav className="border-b border-gray-100 bg-white">
                <div className="flex h-16 justify-between items-center">
                    {/* Left Side Navigation */}
                    <div className="flex items-center space-x-8">
                        <NavLink
                            href={route("dashboard")}
                            active={route().current("dashboard")}
                        >
                            Dashboard
                        </NavLink>
                    </div>

                    {/* Right Side Navigation */}
                    <div className="hidden sm:flex items-center space-x-4">
                        {/* Notifications Dropdown */}
                        <Dropdown>
                            <Dropdown.Trigger>
                                <button
                                    type="button"
                                    className="inline-flex items-center rounded-md bg-white px-3 py-2 text-gray-500 hover:text-gray-700 focus:outline-none"
                                >
                                    <TbBellRinging className="text-gray-500" />
                                </button>
                            </Dropdown.Trigger>
                            <Dropdown.Content>
                                <Dropdown.Link href={route("profile.edit")}>
                                    My Account
                                </Dropdown.Link>
                                <Dropdown.Link href={route("change.password")}>
                                    Change Password
                                </Dropdown.Link>
                                <Dropdown.Link href={route("delete.account")}>
                                    Delete Account
                                </Dropdown.Link>
                                <Dropdown.Link
                                    href={route("logout")}
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </Dropdown.Link>
                            </Dropdown.Content>
                        </Dropdown>

                        {/* User Account Dropdown */}
                        <Dropdown>
                            <Dropdown.Trigger>
                                <button
                                    type="button"
                                    className="inline-flex items-center rounded-md bg-white px-3 py-2 text-gray-500 hover:text-gray-700 focus:outline-none"
                                >
                                    <img
                                        src="assets/images/users/user-1.jpg"
                                        alt="user-image"
                                        className="w-8 h-8 rounded-full"
                                    />
                                    <span className="ml-2 text-gray-700 font-medium">
                                        {account?.name || "Guest"}
                                    </span>
                                    <IoIosArrowDown className="ml-2 text-gray-500" />
                                </button>
                            </Dropdown.Trigger>
                            <Dropdown.Content>
                                <Dropdown.Link href={route("profile.edit")}>
                                    My Account
                                </Dropdown.Link>
                                <Dropdown.Link href={route("change.password")}>
                                    Change Password
                                </Dropdown.Link>
                                <Dropdown.Link href={route("delete.account")}>
                                    Delete Account
                                </Dropdown.Link>
                                <Dropdown.Link
                                    href={route("logout")}
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </Dropdown.Link>
                            </Dropdown.Content>
                        </Dropdown>
                    </div>

                    {/* Mobile Hamburger Menu */}
                    <div className="flex sm:hidden">
                        <button
                            onClick={() => setShowingNavigationDropdown(!showingNavigationDropdown)}
                            className="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                        >
                            <svg
                                className="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                {showingNavigationDropdown ? (
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                ) : (
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                )}
                            </svg>
                        </button>
                    </div>
                </div>

                {/* Mobile Dropdown Navigation */}
                {showingNavigationDropdown && (
                    <div className="sm:hidden">
                        <div className="space-y-1 pb-3 pt-2">
                            <ResponsiveNavLink
                                href={route("dashboard")}
                                active={route().current("dashboard")}
                            >
                                Dashboard
                            </ResponsiveNavLink>
                        </div>
                        <div className="border-t border-gray-200 pb-1 pt-4">
                            <div className="px-4">
                                <div className="text-base font-medium text-gray-800">
                                    {account?.name || "Guest"}
                                </div>
                                <div className="text-sm font-medium text-gray-500">
                                    {user?.email || "No email available"}
                                </div>
                            </div>
                            <div className="mt-3 space-y-1">
                                <ResponsiveNavLink href={route("profile.edit")}>
                                    Profile
                                </ResponsiveNavLink>
                                <ResponsiveNavLink
                                    method="post"
                                    href={route("logout")}
                                    as="button"
                                >
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                )}
            </nav>

            {/* Page Header */}
            {header && (
                <header className="bg-white shadow">
                    <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {header}
                    </div>
                </header>
            )}
        </>
    );
};

export default Header;
