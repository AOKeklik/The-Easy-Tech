"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'
import * as Icon from '@phosphor-icons/react/dist/ssr'
import Link from 'next/link'

const SectionRight = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX(60px)",
            opacity:isInView ? 1 : 0,
        }}
        className='container w-full lg:py-[150px] pt-14 py-16'
    >
        <div className='w-full flex items-center lg:justify-end'>
            <div className='payment-infor lg:w-1/2 xl:pl-20 lg:pl-10'>
                <div className='heading flex items-center gap-4 max-lg:flex-wrap'>
                    <div className='flex items-center'>
                        <div className='img sm:w-12 w-10 sm:h-12 h-10 rounded-full overflow-hidden bg-line p-0 z-[3]'>
                            <Image className='full h-full rounded-full' width={300} height={300} src='/avatar3.webp' alt='img' /> 
                        </div> 
                    </div>
                    <div className='text-button text-secondary'>Trusted by 5M+ People <br/> Around the globe</div> 
                </div>
                <div className='text lg:mt-14 mt-5'>
                    <h3 className='heading3'>Lorem ipsum dolor sit amet.</h3>
                    <div className='body3 text-secondary lg:mt-6 mt-4'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, hic.</div> 
                </div>
                <div className='button-block flex items-center max-sm:flex-wrap sm:gap-6 gap-3 lg:mt-12 mt-8 w-fit'>
                    <Link className='button-main box-shadow bg-blue-700 hover:bg-black text-white bg-blue whitespace-nowrap rounded-full' href='/'>Get Started</Link>
                    <div className='relative'>
                        <Link className='button-main box-shadow hover:bg-black hover:text-white text-on-surface bg-white flex items-center gap-2 rounded-full relative z-[1]' href='/'>
                        <Icon.PhoneIncoming weight='fill' className='text-xl' />
                            <span className='whitespace-nowrap'>+48 23450989345</span>
                        </Link>
                        <Image
                            src='/component/gateway1-dot.png'
                            className='absolute -right-12 w-[100px] h-auto top-1/2 -translate-y-1/2' width={4000} height={4000} alt="img"
                        />
                    </div>

                </div>
            </div> 
        </div> 
    </div>
};

export default SectionRight;