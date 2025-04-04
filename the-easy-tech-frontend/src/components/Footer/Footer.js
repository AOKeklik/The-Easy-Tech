import Link from 'next/link'
import Image from 'next/image'
import * as Icon from '@phosphor-icons/react/dist/ssr'

import { useSelector } from 'react-redux'
import Loader from '@/components/Loader/Loader'

const Footer = () => {
    const { data: settings, loading } = useSelector((state) => state.setting)
    if(loading) return <Loader />
    
    return <div className='footer-block bg-[#0f1e33] pt-[60px]'>
        <div className='container'>
            <div className='flex max-lg:flex-col max-lg:items-start gap-y-10 pb-10'>
                <div className='lg:w-1/4'>
                    <div className='footer-company-infor flex flex-col justify-between gap-5'>
                        <Image width={4000} height={4000} className='footer-logo w-[145px]' src='/LogoWhite.png' />
                        <div className='text caption1 text-white'>Lorem ipsum dolor sit.</div>
                        <div className='list-social flex items-center gap-2'>
                           <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_facebook} target='_blank' >
                                <i className='icon-facebook text-sm'></i> 
                            </Link>
                            <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_linkedin}target='_blank' >
                                <i className='icon-in text-[10px]'></i> 
                            </Link>
                            <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_twitter} target='_blank' >
                                <i className='icon-twitter text-[10px]'></i> 
                            </Link>
                            <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_instagram} target='_blank' >
                                <i className='icon-insta text-[10px]'></i> 
                            </Link>
                            <Link className='item rounded-full w-7 h-7 border-grey border-2 flex items-center justify-center' href={settings?.link_youtube} target='_blank' >
                                <i className='icon-youtube text-[10px]'></i> 
                            </Link>
                        </div>  
                    </div> 
                </div>
                <div className='lg:w-1/2'>
                    <div className='footer-navigate flex items-center justify-center gap-20'>
                        <div className='footer-nav-item'> 
                            <div className='item-heading text-button-sm text-white'>Quick Links</div>
                            <ul className='list-nav mt-1 text-white'>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/about'>About Us</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/service'>Services</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/'>Case Studies</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/contact'>Contact</Link>
                                </li>
                            </ul>
                        </div>
                        <div className='footer-nav-item max-sm:hidden'>
                            <div className='item-heading text-button-sm text-white'>Pages</div>
                            <ul className='list-nav mt-1 text-white'>
                            <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/about'>About Us</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/service'>Services</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/'>Case Studies</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/contact'>Contact</Link>
                                </li>
                            </ul>
                        </div>
                        <div className='footer-nav-item'>
                            <div className='item-heading text-button-sm text-white'>Blog</div>
                            <ul className='list-nav mt-1 text-white'>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/about'>About Us</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/service'>Services</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/'>Case Studies</Link>
                                </li>
                                <li className='mt-3'>
                                    <Link className='caption1 has-line-before line-white text-surface hover-underline' href='/contact'>Contact</Link>
                                </li>
                            </ul>
                        </div> 
                    </div> 
                </div>
                <div className='lg:w-1/4'>
                    <div className='company-contact'>
                        <div className='heading text-button-sm text-white'>NewsLetter</div>
                        <div className='mt-3 flex items-start'>
                            <div className='text'>
                                <div className='cpation2 text-surface text-white'>Need Help? 24/7</div>
                                <div className='fw-700 text-white mt-1'>{settings?.site_phone}</div> 
                            </div> 
                        </div>
                        <div className='locate mt-3 flex items-center'>
                            <div className='caption1 text-surface text-white'>Lorem ipsum dolor sit.</div> 
                        </div>
                        <form className='send-block mt-5 flex items-center h-[45px] rounded-lg overflow-hidden'>
                            <input className='caption1 text-secondary h-full w-full pr-4 pl-3' type="text" placeholder='Your Email Address' />
                            <button className='flex items-center justify-center w-[45px] h-[45px] bg-blue-800 flex-shrink-0'>
                                <Icon.PaperPlaneTilt className='text-white' />
                            </button>
                        </form>

                    </div> 
                </div> 
            </div> 
            <div className='border-line'></div>
            <div className='footer-bottom flex items-center justify-between pt-3 pb-3'>
                <div className='left-block flex items-center'>
                    <div className='copy-right text-surface caption1 text-white'>{settings?.site_copy}</div> 
                </div>
                <div className='nav-link flex items-center gap-3 text-white'>
                    <a href="#" className='text-surface caption1 hover-underline' >Terms of Services</a>
                    <span className='text-surface caption1 '> | </span>
                    <a href="#" className='text-surface caption1 hover-underline' >Privacy Policy</a>
                </div> 
            </div>
        </div> 
    </div>
};

export default Footer;