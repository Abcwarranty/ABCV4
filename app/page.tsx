"use client"

import type React from "react"
import { useState } from "react"
import Image from "next/image"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { CheckCircle, Mail } from "lucide-react"

export default function ComingSoonPage() {
  const [email, setEmail] = useState("")
  const [isSubmitted, setIsSubmitted] = useState(false)
  const [isLoading, setIsLoading] = useState(false)

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    if (!email) return

    setIsLoading(true)

    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 1000))

    setIsSubmitted(true)
    setIsLoading(false)
    setEmail("")
  }

  return (
    <div className="min-h-screen bg-[#d5d8e0] flex items-center justify-center p-4 overflow-hidden">
      <div className="max-w-2xl mx-auto text-center space-y-8">
        {/* Logo */}
        <div className="animate-fade-in">
          <div className="relative w-80 h-80 mx-auto mb-6 md:w-96 md:h-96">
            <Image
              src="/policy-pilots-logo.png"
              alt="Policy Pilots Logo"
              fill
              className="object-contain drop-shadow-lg"
              priority
            />
          </div>
        </div>

        {/* Coming Soon Text */}
        <div className="space-y-4 animate-fade-in-delay">
          <h1 className="text-4xl md:text-6xl font-bold text-slate-800 tracking-tight">Coming Soon</h1>
          <p className="text-lg md:text-xl text-slate-600 max-w-lg mx-auto leading-relaxed">
            Your AI co-pilot for smarter insurance decisions is preparing for takeoff
          </p>
        </div>

        {/* Email Capture Form */}
        <div className="animate-fade-in-delay-2">
          {!isSubmitted ? (
            <form onSubmit={handleSubmit} className="max-w-md mx-auto space-y-4">
              <div className="flex flex-col sm:flex-row gap-3">
                <div className="relative flex-1">
                  <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" />
                  <Input
                    type="email"
                    placeholder="Get notified when we launch"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    className="pl-11 h-12 text-base border-slate-200 bg-white/80 backdrop-blur-sm focus:border-blue-400 focus:ring-blue-400"
                    required
                  />
                </div>
                <Button
                  type="submit"
                  disabled={isLoading}
                  className="h-12 px-8 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5"
                >
                  {isLoading ? (
                    <div className="flex items-center space-x-2">
                      <div className="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin" />
                      <span>Sending...</span>
                    </div>
                  ) : (
                    "Notify Me"
                  )}
                </Button>
              </div>
              <p className="text-sm text-slate-500">Be the first to know when Policy Pilots takes flight</p>
            </form>
          ) : (
            <div className="max-w-md mx-auto p-6 bg-green-50 border border-green-200 rounded-2xl">
              <div className="flex items-center justify-center space-x-2 text-green-700 mb-2">
                <CheckCircle className="w-6 h-6" />
                <span className="font-semibold text-lg">You're on the list!</span>
              </div>
              <p className="text-green-600">We'll notify you as soon as Policy Pilots is ready for takeoff.</p>
            </div>
          )}
        </div>

        {/* Social Proof */}
        <div className="animate-fade-in-delay-3">
          <p className="text-sm text-slate-500 mb-4">Join the flight crew preparing for smarter insurance</p>
          <div className="flex justify-center items-center space-x-6 opacity-60">
            <div className="text-xs font-medium text-slate-400 bg-white/60 px-3 py-1 rounded-full">AI-Powered</div>
            <div className="text-xs font-medium text-slate-400 bg-white/60 px-3 py-1 rounded-full">
              Smart Comparison
            </div>
            <div className="text-xs font-medium text-slate-400 bg-white/60 px-3 py-1 rounded-full">Auto-Switch</div>
          </div>
        </div>
      </div>

      {/* Floating Elements */}
      <div className="absolute inset-0 overflow-hidden pointer-events-none">
        <div className="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-300/30 rounded-full animate-float" />
        <div className="absolute top-3/4 right-1/4 w-3 h-3 bg-slate-300/40 rounded-full animate-float-delay" />
        <div className="absolute top-1/2 right-1/3 w-1 h-1 bg-blue-400/40 rounded-full animate-float-slow" />
      </div>

      {/* Footer */}
      <footer className="absolute bottom-0 left-0 right-0 bg-white/90 backdrop-blur-sm border-t border-black/10 py-2">
        <div className="text-center">
          <p className="text-sm text-slate-500">© 2025 Policy Pilots. All rights reserved.</p>
        </div>
      </footer>
    </div>
  )
}
