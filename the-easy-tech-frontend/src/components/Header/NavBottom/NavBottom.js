import useIsActive from '@/hooks/useIsActive';
import * as Icon from '@phosphor-icons/react/dist/ssr'
import Image from 'next/image'
import Link from 'next/link'
import React, { useEffect, useState } from 'react'

const NavBottom = () => {
    const isActiveItem = useIsActive
    const [fixedHeader, setFixedHeader]=useState(false)
    const [toggleMenu, setToggleMenu]=useState(false)

    useEffect(() => {
        const handleScroll = () => {
            setFixedHeader(window.scrollY > 50)
        }

        window.addEventListener("scroll", handleScroll)
        return () => window.removeEventListener("scroll", handleScroll)
    }, [])

    return (
        <div className={`header-menu bg-white ${fixedHeader ? 'fixed' : ''}`}>
            <div className='container flex items-center justify-between h-20'>
                <Link className='menu-left-block' href="/">
                    <Image
                        src={'/Logo.png'}
                        width={2000}
                        height={1000}
                        alt='logo'
                        priority={true}
                        className='w-[149px] max-sm:w-[132px]'
                    />
                </Link>
                <div className='menu-center-block h-full'>
                    <ul className='menu-nav flex items-center xl:gap-2 h-full'>
                        <li className={`nav-item h-full flex items-center justify-center home ${isActiveItem("/")}`}>
                            <Link className="nav-link text-title flex items-center gap-1" href="/">
                                <span>Home</span>
                            </Link> 
                        </li>

                        <li className={`nav-item h-full flex items-center justify-center home ${isActiveItem("/about")}`}>
                            <Link className='nav-link text-title flex items-center gap-1' href="/about">
                                <span>About Us</span>
                            </Link> 
                        </li>

                        <li className={`nav-item h-full flex items-center justify-center home ${isActiveItem("/service")}`}>
                            <Link className='nav-link text-title flex items-center gap-1' href="/service">
                                <span>Our Services</span>
                            </Link> 
                        </li>

                        <li className={`nav-item h-full flex items-center justify-center home ${isActiveItem("/case-studies")}`}>
                            <Link className='nav-link text-title flex items-center gap-1' href="/case-studies">
                                <span>Case Studies</span>
                            </Link> 
                        </li>

                        <li className={`nav-item h-full flex items-center justify-center home ${isActiveItem("/blog")}`}>
                            <Link className='nav-link text-title flex items-center gap-1' href="/blog">
                                <span>Blog</span>
                            </Link> 
                        </li>

                        <li className={`nav-item h-full flex items-center justify-center home ${isActiveItem("/contact")}`}>
                            <Link className='nav-link text-title flex items-center gap-1' href="/contact">
                                <span>Contact Us</span>
                            </Link> 
                        </li> 
                    </ul> 
                </div>

                <div className='menu-right-block flex items-center'>
                    <div className='icon-call'>
                        <i className='icon-phone-call text-4xl'></i> 
                    </div>
                    <div className='text ml-3'>
                        <div className='text caption1'> Free Consultancy </div>
                        <div className='number text-button'> +123 456 789 </div> 
                    </div>

                    <div className='menu-humburger hidden pointer' onClick={() => setToggleMenu(prev=>!prev)}>
                        <Icon.List className='text-2xl' weight='bold' />
                    </div> 
                </div> 
            </div>

            <div id='menu-mobile-block' className={toggleMenu ? "open" : ""}>
                <div className='menu-mobile-main'>
                    <div className='container'>
                        <ul className='menu-nav-mobile h-full pt-1 pb-1'>
                            <li className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer ${isActiveItem("/")}`}>
                                <a className='nav-link-mobile flex items-center justify-between' href='/'>
                                    <span className='body2 font-bold'>Home</span>
                                </a>
                            </li>

                            <li className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer ${isActiveItem("/about")}`}>
                                <a className='nav-link-mobile flex items-center justify-between' href='/about'>
                                    <span className='body2 font-bold'>About Us</span>
                                </a>
                            </li>

                            <li className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer ${isActiveItem("/service")}`}>
                                <a className='nav-link-mobile flex items-center justify-between' href='/service'>
                                    <span className='body2 font-bold'>Service</span>
                                </a>
                            </li>

                            <li className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer ${isActiveItem("/case-studies")}`}>
                                <a className='nav-link-mobile flex items-center justify-between' href='/case-studies'>
                                    <span className='body2 font-bold'>Case Studies </span>
                                </a>
                            </li>

                            <li className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer ${isActiveItem("/blog")}`}>
                                <a className='nav-link-mobile flex items-center justify-between' href='/blog'>
                                    <span className='body2 font-bold'>Blog</span>
                                </a>
                            </li>

                            <li className={`nav-item-mobile h-full flex-column gap-2 pt-2 pl-3 pr-3 pb-2 pointer ${isActiveItem("/contact")}`}>
                                <a className='nav-link-mobile flex items-center justify-between' href='/contact'>
                                    <span className='body2 font-bold'>Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

    </div>
    );
};

export default NavBottom;